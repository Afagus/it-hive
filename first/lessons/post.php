<?php
$name = $_POST['name'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$email = $_POST['email'];
$errors = 0;
$emptyName = '';


if (empty($name)) {
$emptyValue = 'Заполните Имя' . '<br>';
$errors++;
}
if (empty($subject)) {
echo 'Заполните Тему' . '<br>';
$errors++;

}
if (empty($message)) {
echo 'Заполните Текст сообщения' . '<br>';
$errors++;
}
if (empty($email)) {
echo 'Заполните Почту' . '<br>';
$errors++;

}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
echo "E-mail адрес '$email' указан неверно.\n";

exit;
}

?>
<h1> Форма отправки сообщения от клиента</h1>
<form action="" method="post">
    <table>
        <tr>
            <td><strong><?= $emptyName?></strong>
                <input type="text" name="name" placeholder="Name" value="<?= $name?>"</td>
        </tr>
        <tr>
            <td><input type="text" name="subject" placeholder="subject" value="<?= $subject?>" </td>
        </tr>
        <tr>
            <td><textarea name="message" placeholder="Input your message" ></textarea></td>
        </tr>
        <tr>
            <td><input type="email" name="email" placeholder="email" value="<?= $email?>" </td>
        </tr>
        <tr>
            <td><input type="submit" name=""</td>
        </tr>

    </table>

</form>


<?php

if ($errors == 0){
    $toaddress = 'afagus.13@gmail.com';
    $allinfo = 'TextField: ' . $name . '<br>' .
        'Subject: ' . $subject . '<br>' .
        'Message: ' . $message . '<br>' .
        'E-mail: ' . $email . '<br>';
    echo $allinfo;
    @mail($toaddress, $subject, $allinfo);
} else{
    echo $errors .'  ошибок';
}

