<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=StatusSeeder
 */
final class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $list = [
            [
                'title' => [
                    'cs' => 'Přijatá',
                    'sk' => 'Prijatá',
                ],
                'background' => '#ff0000',
                'color' => Status::COLOR_LIGHT,
                'model' => '0'
            ],
            [
                'title' => [
                    'cs' => 'Probíha',
                    'sk' => 'Prebieha',
                ],
                'background' => '#0040ff',
                'color' => Status::COLOR_LIGHT,
                'model' => '0'
            ],
            [
                'title' => [
                    'cs' => 'Ukončena',
                    'sk' => 'Ukončená',
                ],
                'background' => '#00b414',
                'color' => Status::COLOR_LIGHT,
                'model' => '0'
            ]
        ];

        foreach ($list as $index => $item) {
            Status::updateOrCreate(['sort' => $index + 1], $item);
        }
    }
}
