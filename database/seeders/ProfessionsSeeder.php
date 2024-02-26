<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profession;
use Illuminate\Database\Seeder;
use Laravel\Prompts\Output\ConsoleOutput;

class ProfessionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        self::seedProfessions();
    }

    public static function seedProfessions()
    {
        $output = new ConsoleOutput();
        $output->writeln('Seed: CREANDO PROFESSIONS ................');


        $professions = [

            // construcción
            1 => 'Arquitecto',
            2 => 'Obrero',
            3 => 'Albañil',
            4 => 'Carpintero',
            5 => 'Electricista',
            6 => 'Plomero',
            7 => 'Pintor',
            8 => 'Ingeniero Civil',
            9 => 'Ingeniero Eléctrico',
            10 => 'Ingeniero Mecánico',
            11 => 'Auxiliar de Compras',
            12 => 'Analista de Costos',
            13 => 'Analista de Compras',
            14 => 'Jefe de Compras',
        ];

        $profInsert = [];
        foreach ($professions as $id => $profession) {
            $profInsert[$id] = [
                'id' => $id,
                'name' => $profession,
                'status' => 1,
                'proposed_by_user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Profession::insert($profInsert);
        $output->writeln("Seed: " . count($profInsert) . " professions creados.");
        return collect($profInsert);

    }
}
