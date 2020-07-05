<?php


class Checkbox extends Field
{
    public $options;
    public $dataForCheckbox;

    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->options = $options;
        $this->dataForCheckbox = $options['dataForCheckbox'];


    }

    public function render()
    {if($this->error):?>
        <span><?php echo $this->error?></span>
    <?php endif;

        foreach ($this->dataForCheckbox as $data => $value): ?>
            <input type="checkbox"
                   name="<?= $this->name; ?>[]"
                   value="<?= $value['value']; ?>"


            <?= (isset($_POST[$this->name]) && in_array($value['value'], $_POST[$this->name])) ? 'checked="checked"' : ''; ?>
            ><?= $value['list']; ?><Br>

        <?php endforeach;
    }
}
