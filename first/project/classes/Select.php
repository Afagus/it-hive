<?php


class Select extends Field
{
    private $options = [];
    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->options = $options['options'];
}

    public function render()
    {
        ?>

        <select name='<?= $this->name; ?>'>
            <?php foreach ($this->options as $data => $item): ?>
                <option value='<?= $data; ?>' <?= (isset($this->value) && $this->value == $data) ?
                'selected="selected"' : ''; ?>><?= $item; ?>
                </option>
            <?php endforeach;?>

        </select>
        <?php
    }
}