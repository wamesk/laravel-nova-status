
## 1. Preview
<img alt="preview" src="statuses.png">
<img alt="preview" src="img2.png">
<img alt="preview" src="img3.jpg">
<br>

## 2. Required

```php
"wamesk/laravel-commands": "^1.0",
"wamesk/laravel-nova-language": "dev-main",
"wamesk/laravel-nova-slovak-lang": "^1.0",
"wamesk/utils": "^1.1",
"kongulov/nova-tab-translatable": "^2.0",
"norman-huth/nova-font-awesome-field": "^1.0"
```

## 3. Instalation

- ### register provider
```php
Wame\Statuses\StatusesServiceProvider::class,
```

- ### vendor publish   -- statusesServiceProvider
```php
php artisan vendor:publish --provider="Wame\Statuses\StatusesServiceProvider"
php artisan vendor:publish --provider="Wame\LaravelNovaLanguage\PackageServiceProvider"
```
- ### add and run migrations
php artisan make:migration add_status_to_orders
```php
/* add column to your model*/
$table->foreignUlid('status_id')->nullable()->constrained('statuses')->cascadeOnUpdate()->nullOnDelete();
php artisan migration
```
- ### run seeders
```php
 php artisan db:seed --class=LanguageSeeder
 // php artisan db:seed --class=StatusSeeder
```

<br>

## 4. Usage

- ### Add to your Model
``` php
    public function statuses(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');  // Choose your model
    }
```
- ### Add fields to your Nova Model
``` php
use App\Utils\Helpers\StatusFields;

...StatusFields::get($this, '0'), // set your model category if you use more categories
``` 

- ### Add to your Nova Menu
`MenuItem::resource(Statuses::class),` <br>
`MenuItem::resource(Languages::class),`
```php
Nova::mainMenu(function (Request $request, Menu $menu) {
    return $menu->append(
        MenuSection::make(__('status.menu.settings'), [
            MenuItem::resource('\App\Nova\Status'),
            MenuItem::resource('\App\Nova\Language')
        ])->collapsable()->collapsible()->icon('cog')
    );
});
```
<br>

## 5. Configuration

- ### Edit translates
 edit translates  `resources/lang/sk/status.php `
```php
    'selected' => [
        '0' => 'prispevky',
        '1' => 'napady',
    ],
```
<br>

## 5. More options / extensions

- ### If you want to use CATEGORIES <small>for more Models </small>
uncomment this in Nova Model Status and add translates for models
```php
 Select::make(__('status.field.category'), 'model')
```

- ### If you want to use ICONS 
uncomment this
```php
 \NormanHuth\FontAwesomeField\FontAwesome::make(__('Icon'), 'icon'),
```
and add CSS to NovaSericeProvider
```php
Nova::style('status_icons', resource_path('css/icon_fields.css'));
```
<br>


## Add Language
Add or delete language in language menu,
set languages in `tab-translatable.php`,

```php
    'locales' => [
            'sk'
        ],
    'required' => 'required_lang:sk',
```

