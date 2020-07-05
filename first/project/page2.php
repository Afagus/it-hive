<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$toaddress = 'nikolaj.agro@gmail.com';
$subject = 'something 2';

$form = [

    'name' => [
        'type' => 'text',
        'name' => 'name',
        'placeholder' => 'Enter name',
        'value' => '',
        'validation' => 'Not empty',
        'lableForletter' => 'Имя'
    ],
    'subject' => [
        'type' => 'text',
        'name' => 'subject',
        'placeholder' => 'Enter subject',
        'value' => '',
        'validation' => 'Not empty',
        'lableForletter' => 'Тема'
    ],
    'email' => [
        'type' => 'email',
        'name' => 'email',
        'placeholder' => 'Enter e-mail',
        'value' => '',
        'validation' => 'Not empty',
        'lableForletter' => 'Электронная почта'

    ],
    'message' => [
        'type' => 'textarea',
        'name' => 'message',
        'placeholder' => 'Input your message',
        'value' => '',
        'validation' => 'Not empty',
        'lableForletter' => 'Сообщение'
    ],
];

include 'engine.php';


mainfunction($form, $toaddress, $subject);