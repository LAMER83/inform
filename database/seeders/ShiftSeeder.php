<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shift = [
            'День',
            'Ночь',
        ];

        foreach ($shift as $value)
        {
            Shift::query()->create(
                [
                    'name' => $value,
                ]
            );
        }
    }
 }
