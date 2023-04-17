<?php

use Wame\Statuses\Utils\Helpers\StatusFields;

/*
 Set count your models and edit translate Selected []
 */
$model_count = 1;


$selectTypes = StatusFields::getSelectTypes($model_count);
return [
    'selectTypes' => $selectTypes,

    'color' => [
        'text' => [
            '0' => 'status.text.dark',
            '1' => 'status.text.light',
        ],
    ],

];

