<?php


class TextArea extends Field
{

    public function render()
    {

        if($this->error):?>
        <span><?php echo $this->error?></span>
        <?php endif;?>

        <textarea
            name='<?= $this->name; ?>'
            placeholder='<?= $this->placeholder; ?>'
        ><?= (!isset($_POST['name'])) ? $this->value : $_POST[$this->name]; ?></textarea>

        <?php
    }
}
