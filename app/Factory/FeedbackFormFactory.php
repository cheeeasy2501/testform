<?
namespace App\Factory;

use App\Factory\FormFactory;
use App\Factory\Classes\FeedbackForm;

class FeedbackFormFactory implements FormFactory {

    public function create() {
        return new FeedbackForm();
    }

    public function getFormData() {
        return 'data';
    }
}
