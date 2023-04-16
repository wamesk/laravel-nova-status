<?php

declare(strict_types = 1);

namespace App\Nova\Status;

use App\Models\Status;

class StatusField
{
    public static function index($orderStatus)
    {
       $orderStatus->icon ?$orderStatusIcon =  '<span class="obrazok" style="">' . $orderStatus->icon . '</span>' : $orderStatusIcon = '';
        return
            '<span class="px-3 py-1 rounded-full font-bold" style="background-color: ' .
            $orderStatus->background . '; color: ' . (Status::COLOR_LIGHT === $orderStatus->color ? '#ffffff' : '#000000') . ';">'
            . $orderStatusIcon .
            $orderStatus->title .
            '</span>';
    }
}
