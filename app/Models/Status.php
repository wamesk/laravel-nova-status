<?php

declare(strict_types = 1);

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\Translatable\HasTranslations;
use Wame\Statuses\Utils\Models\SortableTrait;

class Status extends BaseModel implements Sortable
{
    use HasTranslations;
    use HasUlids;
    use SoftDeletes;
    use SortableTrait;

    public const COLOR_DARK = '0';

    public const COLOR_LIGHT = '1';

    public array $translatable = ['title'];

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->sortable['sort_on_has_many'] = false;
    }

//    public function model(): \Illuminate\Database\Eloquent\Relations\MorphTo
//    {
//        return $this->morphTo('model', 'type');
//    }

    public function statuses(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'status_id');
    }
}
