<?php


class Radio extends Field
{
    public $options;
    public $nameValue;


    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->options = $options;
        $this->nameValue = $options['nameValue'];
    }

    public function render()
    {if($this->error):?>
        <span><?php echo $this->error?></span>
    <?php endif;

        foreach ($this->options['nameValue'] as $data => $value): ?>
            <input type="radio"
                   name="<?= $this->name; ?>"
                   value="<?= $value['value']; ?>"
                <?= (isset($_POST[$this->name]) && $_POST[$this->name] == $value['value']) ? 'checked = checked' : ''; ?>
                   id="<?= $value['id']; ?>">
            <label for="<?= $value['id']; ?>"><?= $value['view']; ?></label><br>
        <?php endforeach;
    }
}

