<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factory\FeedbackFormFactory;

class FormController extends Controller
{
    public function save(Request $request) {
        try {
            $data = $request->all();
          
            if($request->isMethod('post') && $data) {
                $factory = new FeedbackFormFactory();
                $form = $factory->create();
                $form->setData($data);
             
                if($form->saveInDb() && $form->saveInFile($data)) {
                    return response()->json(['message' => 'Data Saved'], 200);
                }
            }

            return response()->json(['message' => 'Bad Request'], 400);
        } catch (\Exception $e) {

            return response()->json(['message' => 'Server Error: '.$e], 500);
        }
    }
}
