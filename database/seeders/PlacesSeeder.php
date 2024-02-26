<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Place;
use Illuminate\Database\Seeder;
use Laravel\Prompts\Output\ConsoleOutput;

class PlacesSeeder extends Seeder
{
    /**
     * Seed the application's places.
     */
    public function run(): void
    {
        self::seedPlaces();
    }

    public static function seedPlaces()
    {

        $output = new ConsoleOutput();
        $output->writeln('Seed: CREANDO PLACES ................');

        $places = [
            'Guatemala' => [
                'Alta Verapaz' => [
                    'Cobán',
                    'Santa Cruz Verapaz',
                    'San Cristóbal Verapaz',
                    'Tactic',
                    'Tamahú',
                    'Tucurú',
                    'Panzós',
                    'Senahú',
                    'San Pedro Carchá',
                    'San Juan Chamelco',
                    'Lanquín',
                    'Santa María Cahabón',
                    'Chisec',
                    'Chahal',
                    'Fray Bartolomé de las Casas',
                    'Santa Catalina La Tinta',
                    'Raxruha',
                ],
                'Baja Verapaz' => [

                ],
                'Chimaltenango' => [

                ],
                'Chiquimula' => [

                ],
                'El Progreso' => [

                ],
                'Escuintla' => [

                ],
                'Depto. de Guatemala' => [
                    'Municipio Guatemala',
                    'Villa Nueva',
                    'Mixco',
                    'Santa Catarina Pinula',
                    'San José Pinula',
                    'San José del Golfo',
                    'Palencia',
                    'Chinautla',
                    'San Pedro Ayampuc',
                    'San Pedro Sacatepéquez',
                    'San Juan Sacatepéquez',
                    'San Raymundo',
                    'Chuarrancho',
                    'Fraijanes',
                    'Amatitlán',
                    'Villa Canales',
                    'San Miguel Petapa',
                ],
                'Huehuetenango' => [

                ],
                'Izabal' => [

                ],
                'Jalapa' => [

                ],
                'Jutiapa' => [

                ],
                'Petén' => [

                ],
                'Quetzaltenango' => [

                ],
                'Quiché' => [

                ],
                'Retalhuleu' => [

                ],
                'Sacatepéquez' => [

                ],
                'San Marcos' => [

                ],
                'Santa Rosa' => [

                ],
                'Sololá' => [

                ],
                'Suchitepéquez' => [

                ],
                'Totonicapán' => [

                ],
                'Zacapa' => [

                ],
            ]
        ];

        $placesInsert = [];
        $id = 0;
        foreach ($places as $order1Name => $subOrder1) {
            // Si es país, siempre será el primer nivel
            // y tendrá un array de order2s
            $order1Id = ++$id;

            $placesInsert[$order1Id] = [
                'id' => $order1Id,
                'country_id' => null,
                'parent_order_2' => null,
                'parent_order_3' => null,
                'name' => $order1Name,
                'order' => 1,
            ];

            foreach ($subOrder1 as $order2Name => $subOrder2) {

                // Si es order2 puede que NO tenga order3s
                // en ese caso no será array y solo nombre

                $order2Id = ++$id;
                $name = $order2Name;
                if(!is_array($subOrder2)){
                    $name = $subOrder2;
                }

                $placesInsert[$order2Id] = [
                    'id' => $order2Id,
                    'country_id' => $order1Id,
                    'parent_order_2' => null,
                    'parent_order_3' => null,
                    'name' => $name,
                    'order' => 2,
                ];

                if(!is_array($subOrder2)){
                    continue;
                }

                foreach ($subOrder2 as $order3Name => $subOrder3) {

                    // Si es order3 puede que NO tenga order4s
                    // en ese caso no será array y solo nombre

                    $order3Id = ++$id;
                    $name = $order3Name;
                    if(!is_array($subOrder3)){
                        $name = $subOrder3;
                    }

                    $placesInsert[$order3Id] = [
                        'id' => $order3Id,
                        'country_id' => $order1Id,
                        'parent_order_2' => $order2Id,
                        'parent_order_3' => null,
                        'name' => $name,
                        'order' => 3,
                    ];

                    if(!is_array($subOrder3)){
                        continue;
                    }

                    foreach ($subOrder3 as $order4Name) {

                        // Si es order4 NO puede tener más niveles
                        // no es array, sino solo nombre

                        $order4Id = ++$id;
                        $name = $order4Name;
                        $placesInsert[$order4Id] = [
                            'id' => $order4Id,
                            'country_id' => $order1Id,
                            'parent_order_2' => $order2Id,
                            'parent_order_3' => $order3Id,
                            'name' => $name,
                            'order' => 4,
                        ];

                    }


                }

            }
        }

        Place::insert($placesInsert);
        $output->writeln("Seed: " . count($placesInsert) . " places creados.");
        return collect($placesInsert);
    }
}


