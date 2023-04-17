<?php

use Wame\Statuses\Utils\Helpers\StatusFields;

/*
 Set count your models only if you don't use sk translate ( Selected [] )
 */
$model_count = 'default'; // from sk translate
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

