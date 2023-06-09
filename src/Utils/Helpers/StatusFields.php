<?php

declare(strict_types = 1);

namespace Wame\Statuses\Utils\Helpers;


use App\Nova\Status\StatusFieldCss;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class StatusFields
{
    public static function get($status, $category): array
    {
        return [
            BelongsTo::make(__('status.field.status'), 'statuses', \App\Nova\Status::class)
                ->relatableQueryUsing(function (NovaRequest $request, Builder $query) use ($category) {
                    $query->whereIn('model', [$category]);  // name in config
                })
                ->filterable()
                ->hideFromIndex()
                ->hideFromDetail()
                ->updateRules('sometimes'),

            Text::make(__('status.field.status'), 'status_id')
                ->displayUsing(fn() => StatusFieldCss::index($status->statuses))
                ->asHtml()
                ->sortable()
                ->exceptOnForms()
                ->showOnPreview()
        ];
    }

    /**
     * @param int $model_count
     * @return array|string[]
     */
    public static function getSelectTypes($model_count): array
    {
        if ($model_count == 'default'){
            $config = include(base_path('resources/lang/sk/status.php'));
            $selected = $config['selected'];
            $model_count = count($selected);
        }

        $selectTypes = [];
        for ($x = 0; $x < $model_count; $x++) {
            $selectTypes += ["$x" => "status.selected.$x"];
        }
        return $selectTypes;
    }

}
