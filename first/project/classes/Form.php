<?php
include 'Field.php';
include 'TextField.php';
include 'Checkbox.php';
include 'Radio.php';
include 'Email.php';
include 'Select.php';
include 'TextArea.php';


class Form
{
    public $form;
    private $toaddress;
    private $subject;
    private $errors = 0;
    public $arrayOfFields = [];


    function __construct($form, $toaddress, $subject)
    {
        $this->form = $form;
        $this->toaddress = $toaddress;
        $this->subject = $subject;


        $this->createFields();
        //$this->checkAndSend();
        $this->selfValidate();


    }


    /*
     * Create objects of fields and put them in array
     */
    public function createFields()
    {
        foreach ($this->form as $key => $element) {
            switch ($element['type']) {
                case 'text':
                {
                    $this->arrayOfFields[] = new TextField($element);
                    break;
                }
                case 'email':
                {
                    $this->arrayOfFields[] = new Email($element);
                    break;
                }
                case 'textarea':
                {
                    $this->arrayOfFields[] = new TextArea($element);
                    break;
                }
                case 'select':
                    $this->arrayOfFields[] = new Select($element);
                    break;
                case 'checkbox':
                    $this->arrayOfFields[] = new Checkbox($element);
                    break;
                case 'radio':
                    $this->arrayOfFields[] = new Radio($element);
                    break;
            }
        }
    }

    /*
     * Create form
     * */
    public function createForm()
    {
        ?>
        <h1> Форма отправки сообщения от клиента </h1>
        <form action="" method="post">
            <table>
                <?php foreach ($this->arrayOfFields as $element): ?>
                    <tr>
                        <td>
                            <?php $element->render(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <td><input type="submit" name=""</td>
                </tr>
            </table>
        </form>


        <?php


    }


    private function selfValidate()
    {
        if (count($_POST)) {
            foreach ($this->arrayOfFields as $key => $value) {
                if ($value->validate() == 0) {
                    $this->errors++;
                }
            }
        }
    }

    //TODO: check this function and remake
    public function checkAndSend()
    {
        $allinfo = '';
        $temp = '';
        if ($this->errors == 0 && empty(!$_POST)) {


            foreach ($this->form as $key => $forLetter) {
                if (is_array($_POST[$key])) {
                    foreach ($_POST[$key] as $item) {
                        $temp .= $item . ', ';
                    }
                    $allinfo .= $forLetter['labelForLetter'] . ': ' . $temp . '<br>';
                } else {
                    $allinfo .= $forLetter['labelForLetter'] . ': ' . $_POST[$key] . '<br>';
                }

            }

            //echo $allinfo;
            @mail($this->toaddress, $this->subject, $allinfo);
            //header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
            //die;
            ?>


            <?php
            echo 'Письмо будет отправлено на почту: ' . $this->toaddress;
        } else {
            echo $this->errors . '  ошибок';

        }
    }
}
