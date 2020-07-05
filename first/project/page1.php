<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$toaddress = 'afagus.13@gmail.com';
$subject = 'something 1';

$form = [

    'name' => [
        'type' => 'text',
        'name' => 'name',
        'placeholder' => 'Enter name',
        'value' => '',
        'validation' => 'not_empty',
        'labelForLetter' => 'Имя'
    ],
    'subject' => [
        'type' => 'text',
        'name' => 'subject',
        'placeholder' => 'Enter subject',
        'value' => '',
        'validation' => 'not_empty',
        'labelForLetter' => 'Тема'
    ],
    'email' => [
        'type' => 'email',
        'name' => 'email',
        'placeholder' => 'Enter e-mail',
        'value' => '',
        'validation' => 'email',
        'labelForLetter' => 'Электронная почта'

    ],
    'message' => [
        'type' => 'textarea',
        'name' => 'message',
        'placeholder' => 'Input your message',
        'value' => '',
        'validation' => 'not_empty',
        'labelForLetter' => 'Сообщение'
    ],
    'select' => [
        'labelForLetter' => 'Выбор из выпадающего списка',
        'type' => 'select',
        'name' => 'select',
        'options' => ['value1' => 1,
                    'value2' => 2,
                    'value3' => 3],
        'validation' => ''
    ],
    'checkbox' => [

        'labelForLetter' => 'Чекбокс',
        'type' => 'checkbox',
        'name' => 'checkbox',
        'dataForCheckbox' => [
            ['value' => 'valueOfItem1',
                'list' => 'stringOfList1'],

            ['value' => 'valueOfItem2',
                'list' => 'stringOfList2'],

            ['value' => 'valueOfItem3',
                'list' => 'stringOfList3']
        ],
        'validation' => ''

    ],
    'radio' => [

        'labelForLetter' => 'Пол клиента',
        'validation' => '',
        'type' => 'radio',
        'name' => 'radio',
        'nameValue' => [
            [
                'id' => 'male',
                'value' => 'male',
                'view' => 'Male'],

            [
                'id' => 'female',
                'value' => 'female',
                'view' => 'Female'],

            [
                'id' => 'other',
                'value' => 'other',
                'view' => 'Other']
        ]
    ]
];
$motherPath = $_SERVER['DOCUMENT_ROOT'];
include "$motherPath/first/project/classes/Form.php";
$obj = new Form($form, $toaddress, $subject);
$obj->createForm();

echo '<pre>';
print_r($_POST);
echo '</pre>';

