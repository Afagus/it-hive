<?php


class TextField extends Field
{
    public $options;

    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->options = $options;
    }

    public function render()
    {
        if($this->error):?>
        <span><?php echo $this->error?></span>
        <?php endif;?>

        <input type="text"
               name="<?= ($this->name) ?>"
               placeholder="<?= $this->placeholder ?>"
               value="<?= (!isset($_POST[$this->name])) ? $this->value : $_POST[$this->name]; ?>"/>

        <?php

    }
}