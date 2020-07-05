<?php
include 'Validations.php';

abstract class Field
{

    public $name;
    public $validation;
    public $value;
    public $labelForLetter;
    public $placeholder;
    public $error = '';
    static $valid = [];

    public function __construct($options = [])
    {
        $this->name = $options['name'];
        $this->validation = $options['validation'];
        $this->labelForLetter = $options['labelForLetter'];
        $this->placeholder = (isset($options['placeholder'])) ? $options['placeholder'] : '';
        $this->value = (isset($_POST[$this->name])) ? ($_POST[$this->name]) : '';
    }

    public abstract function render();

    public static function validateField($title, $funcOfValidate)
    {
        self::$valid[$title] = $funcOfValidate;
    }


    public function validate()
    {
        if($this->validation){
            $result = (self::$valid[$this->validation])($this->value);
            if(!$result['isValid']){
                $this->error = $result['message'];
                return 0;
            }
        }
        return 1;
        //TODO: Нужно реализовать

    }



}

