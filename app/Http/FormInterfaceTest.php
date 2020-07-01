<?php
interface Form {

    public function setVariable($name, $var);
    public function saveInDb();
    public function saveInFile();
    
}

class FeedbackForm implements Form {
    private $name;
    private $phone;
    private $body;

    public function setVariable($name, $var) {
        $this->vars[$name] = $var;
    }

    public function saveInDb() {
       // Save
    }

    public function saveInFile() {
        // Save
    }
}

// Factory
interface FormFactory {
    public function createForm();
    public function getFormData();
}

class FeedbackFormFactory implements FormFactory {

    public $form;

    function __construct() {
        $this->form = $this->createForm();
    }

    public function createForm() {
        return new FeedbackForm();
    }

    public function getFormData() {

    }
}