<?
namespace App\Factory\Classes;

use App\Factory\Interfaces\FormInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FeedbackForm extends Model implements FormInterface  {

    public function getData() {
        return $this->getAttributes();
    }

    public function setData($data) {
        $this->setRawAttributes($data);
    }

    public function setDataField($name, $value) {
        $this->setAttribute($name, $value);
    }

    public function getDataField($name) {
        return $this->getAttribute($name);
    }

    public function saveInDb() {
        try {
            if ($this->save()) {
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    public function saveInFile($data) {
        try {
            $filename = 'feedbacks.json';
            $data['date'] = date('c');
            $exists = Storage::disk('files')->exists($filename);

            if(!$exists) {
                Storage::disk('files')->put($filename,'['.json_encode($data).']');
                return true;
            }

            $feedbackArray = json_decode(Storage::disk('files')->get($filename));
            array_unshift($feedbackArray, $data);
            Storage::disk('files')->put($filename, json_encode($feedbackArray));

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function sendToEmail($emailArray) {

    }
}

