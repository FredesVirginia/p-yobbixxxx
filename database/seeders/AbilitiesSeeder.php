<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ability;
use App\Models\Profession;
use Illuminate\Database\Seeder;
use Laravel\Prompts\Output\ConsoleOutput;

class AbilitiesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        self::seedAbilities();
    }

    public static function seedAbilities()
    {
        $output = new ConsoleOutput();
        $output->writeln('Seed: CREANDO ABILITIES ................');

        $abilities = [];
        for ($i=1; $i <= 20 ; $i++) {
            $abilities[$i] = [
                'id' => $i,
                'name' => "Habilidad $i",
                'status' => 1,
                'proposed_by_user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Ability::insert($abilities);
        $output->writeln("Seed: " . count($abilities) . " abilities creados.");
        return collect($abilities);

    }
}
