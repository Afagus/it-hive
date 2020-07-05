<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$errors = 0;

$form = [

    'name' => [
        'type' => 'text',
        'name' => 'name',
        'placeholder' => 'Enter name',
        'value' => '',
        'validation' => 'Not empty'
    ],
    'subject' => [
        'type' => 'text',
        'name' => 'subject',
        'placeholder' => 'Enter subject',
        'value' => '',
        'validation' => 'Not empty'
    ],
    'email' => [
        'type' => 'email',
        'name' => 'email',
        'placeholder' => 'Enter e-mail',
        'value' => '',

    ],
    'message' => [
        'type' => 'textarea',
        'name' => 'message',
        'placeholder' => 'Input your message',
        'value' => '',
        'validation' => 'Not empty'
    ],
    'select' => [
        'type' => 'select',
        'name' => 'select',
        'value' => ['value1' => 1,
            'value2' => 2,
            'value3' => 3]
    ],
    'checkbox' => [
        'type' => 'checkbox',
        'nameValue' => [
            ['name' => 'option1',
                'value' => 'valueOfItem1',
                'list' => 'stringOfList1'],

            ['name' => 'option2',
                'value' => 'valueOfItem2',
                'list' => 'stringOfList2'],

            ['name' => 'option3',
                'value' => 'valueOfItem3',
                'list' => 'stringOfList3']
        ]
    ],
    'radio' => [
        'type' => 'radio',
        'nameValue' => [
            ['name' => 'gender',
                'id' => 'male',
                'value' => 'male',
                'view' => 'Male'],

            ['name' => 'gender',
                'id' => 'female',
                'value' => 'female',
                'view' => 'Female'],

            ['name' => 'gender',
                'id' => 'other',
                'value' => 'other',
                'view' => 'Other']
        ]
    ]
];

include 'engine.php';

?>
    <h1> Форма отправки сообщения от клиента #1</h1>
    <form action="" method="post">
        <table>
            <?php foreach ($form

            as $element): ?>
            <tr>
                <td>
                    <?php
                    switch ($element['type']) {
                        case 'text':
                        case 'email':
                        { ?>
                            <input type='<?= $element['type'] ?>'
                                   name='<?= $element['name'] ?>'
                                   placeholder='<?= $element['placeholder'] ?>'
                                   value='<?= $element['value']; ?>'>
                            <?php break;
                        }
                        case 'textarea':
                        {
                            ?>
                            <textarea
                                    name='<?= $element['name']; ?>'
                                    placeholder='<?= $element['placeholder']; ?>'></textarea>

                            <?php break;
                        }
                        case 'select': ?>
                            <select name='<?= $element['name']; ?>'>
                                <?php foreach ($element['value'] as $data => $value): ?>
                                    <option value='<?= $data; ?>'><?= $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php break;


                        case 'checkbox': ?>

                            <?php foreach ($element['nameValue'] as $data => $value): ?>
                                <input type="checkbox" name="<?= $value['name']; ?>"
                                       value="<?= $value['value']; ?>"><?= $value['list']; ?><Br>

                            <?php endforeach; ?><br>


                            <?php break;

                        case 'radio': ?>
                            <?php foreach ($element['nameValue'] as $data => $value): ?>
                                <input type="radio"
                                       name="<?= $value['name']; ?>"
                                       value="<?= $value['value']; ?>"
                                       id="<?= $value['id']; ?>">
                                <label for="<?= $value['id']; ?>"><?= $value['view']; ?></label><br>

                            <?php endforeach; ?><br>

                            <?php break;


                    }
                    endforeach; ?>

                </td>
            </tr>
            <td><input type="submit" name=""</td>
            </tr>
        </table>
    </form>


<?php

//if ($errors == 0) {
//    $toaddress = 'afagus.13@gmail.com';
//    $allinfo = 'TextField: ' . $name . '<br>' .
//        'Subject: ' . $subject . '<br>' .
//        'Message: ' . $message . '<br>' .
//        'E-mail: ' . $email . '<br>';
//    echo $allinfo;
//    @mail($toaddress, $form[0]['subject'], $allinfo);
//} else {
//    echo $errors . '  ошибок';
//}
echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<pre>';
print_r($form);
echo '</pre>';