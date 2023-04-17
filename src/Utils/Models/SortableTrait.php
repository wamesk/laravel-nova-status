<?php

declare(strict_types = 1);

namespace Wame\Statuses\Utils\Models;

trait SortableTrait
{
    use \Spatie\EloquentSortable\SortableTrait;


    public $sortable = [
        'order_column_name' => 'sort',
        'sort_when_creating' => true,
        'sort_on_has_many' => true,
        'sort_on_belongs_to' => true,
        'nova_order_by' => 'ASC',
    ];
}
