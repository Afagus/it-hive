<?php

Field::validateField('not_empty',
    function ($val) {
        return [
            'isValid' => (bool)$val,
            'message' => "Заполните поле  <br>"
        ];
    });

Field::validateField('email',
    function ($val) {
        return [
            'isValid' => (bool)(filter_var($val, FILTER_VALIDATE_EMAIL)),
            'message' => "Заполните корректно email  <br>"
        ];
    });

