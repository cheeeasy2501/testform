<?
namespace App\Factory\Interfaces;

interface FormInterface {
    public function getData();
    public function setDataField($name, $value);
    public function getDataField($name);

    public function saveInDb();
    public function saveInFile($data);
    public function sendToEmail($emailArray);
}
