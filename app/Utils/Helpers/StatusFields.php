<?php

declare(strict_types = 1);

namespace App\Utils\Helpers;

use App\Nova\Status\StatusField;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class StatusFields
{
    public static function get($status, $category): array
    {
        return [
            BelongsTo::make(__('order.field.status'), 'statuses', \App\Nova\Status::class)
                ->relatableQueryUsing(function (NovaRequest $request, Builder $query) use ($category) {
                    $query->whereIn('model', [$category]);  // name in config
                })
                ->filterable()
                ->hideFromIndex()
                ->hideFromDetail(),

            Text::make(__('order.field.status'), 'status_id')
                ->displayUsing(fn() => StatusField::index($status->statuses))
                ->asHtml()
                ->sortable()
                ->exceptOnForms()
                ->showOnPreview()
        ];
    }
}
