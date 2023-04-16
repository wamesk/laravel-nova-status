<?php

//declare(strict_types = 1);

namespace App\Nova;

use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\Color;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaSortable\Traits\HasSortableRows;
use Wame\Utils\Helpers\Translator;

class Status extends BaseResource
{
    use HasSortableRows;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Status::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title',
    ];

    public static $clickAction = 'edit';

    /**
     * Get the fields displayed by the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            Tabs::make(__('status.detail', ['title' => $this->title ?: '']), [
                Tab::make(__('status.singular'), [
                    ID::make()->onlyOnForms(),

                    NovaTabTranslatable::make([
                        Text::make(__('status.field.title'), 'title')
                            ->help(__('status.field.title.help'))
                            ->rules(config('tab-translatable.required')),
                    ])->onlyOnForms(),

                    Text::make(__('status.field.title'), 'title')
                        ->filterable()
                        ->exceptOnForms()
                        ->showOnPreview(),

                    Color::make(__('status.field.background'), 'background')
                        ->help(__('status.field.background.help'))
                        ->required()
                        ->rules('required'),

                    Select::make(__('status.field.color'), 'color')
                        ->help(__('status.field.color.help'))
                        ->options(Translator::arrayValue(config('wame.color.text')))
                        ->required()
                        ->rules('required')
                        ->displayUsing(fn () => __(config('wame.color.text.' . $this->color))),

                    // \NormanHuth\FontAwesomeField\FontAwesome::make(__('Icon'), 'icon'),

                    Select::make(__('status.field.category'), 'model')
                        //->options(__('status.selected') )
                        ->options(Translator::arrayValue( config('wame-statuses.selectTypes') ))
                        ->displayUsing(fn ($name) => __(config("wame-statuses.selectTypes.$name")))
                        ->sortable()
                        ->filterable(),
                ]),
            ]),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
