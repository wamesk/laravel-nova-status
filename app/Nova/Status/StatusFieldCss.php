<?php

declare(strict_types=1);

namespace App\Nova\Status;

use App\Models\Status;

class StatusFieldCss
{
    public static function index($orderStatus)
    {
        $svg_color = $orderStatus->color ? 'filter:invert(100%)' : '';
        $orderStatus->icon ? $orderStatusIcon = "<span class='status-icon' style=$svg_color> $orderStatus->icon </span>" : $orderStatusIcon = '';

        return
            '<span class="status-icon-container px-3 py-1 rounded-full font-bold" style="background-color: ' .
            $orderStatus->background . '; color: ' . (Status::COLOR_LIGHT === $orderStatus->color ? '#ffffff' : '#000000') . ';">'
                . $orderStatusIcon . $orderStatus->title .
            '</span>';
    }
}
