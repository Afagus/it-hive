<?php


function mainfunction($form, $toaddress, $subject)
{
    $errors = 0;
    if (count($_POST)) {
        foreach ($form as $key => $value) {
            if ($value['validation'] == 'Not empty') {
                if (!$_POST[$key]) {
                    $errors++;
                    $form[$key]['error'] = 'Заполните поле';
                }

            }
            if ($value['type'] == 'email') {
                $email = $_POST[$key];

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $form[$key]['error'] = "E-mail адрес  указан неверно";
                }
            }
        }
    }

    ?>
    <h1> Форма отправки сообщения от клиента </h1>
    <form action="" method="post">
        <table>
            <?php foreach ($form as $key => $element): ?>
            <tr>
                <td>
                    <?php if (isset($element['error']))
                        echo ($element['error']) ? $element['error'] . '<br>' : ''; ?>
                    <?php
                    switch ($element['type']) {
                        case 'text':
                        case 'email':
                        { ?>
                            <input type='<?= $element['type'] ?>'
                                   name='<?= $element['name'] ?>'
                                   placeholder='<?= $element['placeholder'] ?>'
                                   value='<?= (!isset($_POST['name'])) ? $element['value'] : $_POST[$element['name']]; ?>'>
                            <?php break;
                        }
                        case 'textarea':
                        {
                            ?>
                            <textarea
                                    name='<?= $element['name']; ?>'
                                    placeholder='<?= $element['placeholder']; ?>'
                            ><?= (!isset($_POST['name'])) ? $element['value'] : $_POST[$element['name']]; ?></textarea>

                            <?php break;
                        }
                        case 'select': ?>
                            <select name='<?= $element['name']; ?>'>
                                <?php foreach ($element['value'] as $data => $value): ?>
                                    <option value='<?= $data; ?>' <?= (isset($_POST[$element['name']]) && $_POST[$element['name']] == $data) ? 'selected="selected"' : ''; ?>><?= $value; ?></option>

                                <?php endforeach; ?>
                            </select>
                            <?php break;
                        case 'checkbox': ?>

                            <?php foreach ($element['dataForCheckbox'] as $data => $value): ?>
                                <input type="checkbox"
                                       name="<?= $element['name']; ?>[]"
                                       value="<?= $value['value']; ?>"
                                <?= (isset($_POST[$element['name']]) && in_array($value["value"], $_POST['checkbox'])) ? 'checked="checked"' : ''; ?>
                                ><?= $value['list']; ?><Br>

                            <?php endforeach; ?><br>


                            <?php break;
                        case 'radio': ?>
                            <?php foreach ($element['nameValue'] as $data => $value): ?>
                                <input type="radio"
                                       name="<?= $element['name']; ?>"
                                       value="<?= $value['value']; ?>"
                                    <?= (isset($_POST[$element['name']]) && $_POST[$element['name']] == $value['value']) ? 'checked = checked' : ''; ?>
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

    $allinfo = '';
    $temp = '';
    if ($errors == 0 && empty(!$_POST)) {


        foreach ($form as $key => $forLetter) {
            if (is_array($_POST[$key])) {
                foreach ($_POST[$key] as $item) {
                    $temp .= $item . ', ';
                }
                $allinfo .= $forLetter['labelForletter'] . ': ' . $temp . '<br>';
            } else {
                $allinfo .= $forLetter['labelForletter'] . ': ' . $_POST[$key] . '<br>';
            }

        }

        echo $allinfo;
        @mail($toaddress, $subject, $allinfo); ?>

        <script>alert('ПИСЬМО ОТПРАВЛЕНО СПАСИБО! ')</script>


        <?php
        echo 'Письмо будет отправлено на почту: ' . $toaddress;
    } else {
        echo $errors . '  ошибок';

    }
}

