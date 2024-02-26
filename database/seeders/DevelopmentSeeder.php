<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use App\Models\Worker;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Prompts\Output\ConsoleOutput;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=DevelopmentSeeder
     * ó php artisan migrate:fresh --seed --seeder=DevelopmentSeeder
     */
    public function run(): void
    {
        $faker = Factory::create('es_MX');
        $output = new ConsoleOutput();

        ///////////////////////////////////////////////////////////
        //////////////////////// TIMESTAMPS  ////////////////////////
        //////////////////////////////////////////////////////////
        $timestamps = [];

        $timeCount = 300;
        for ($t=0; $t <= $timeCount; $t++) {
            $startDate = '-' .($timeCount + 2 - $t).' weeks';
            $endDate = '-' .($timeCount + 1 - $t).' weeks';
            $timestamps[$t] = $faker->dateTimeBetween($startDate, $endDate, $timezone = null);
        }


        ///////////////////////////////////////////////////////////
        //////////////////////// USUARIOS  ////////////////////////
        //////////////////////////////////////////////////////////
        $output->writeln('Seed: CREANDO USUARIOS ................');

        $users = [
            1 => [
                'id' => 1,
                'name' => "José",
                'email' => "admin@email.com",
                'password' => Hash::make(env('ADMIN_PASS')),
                'email_verified_at' => now(),
                'role_id' => User::ROLES['admin'],
                'company_id' => 1,
                'created_at' => $timestamps[1],
                'updated_at' => $timestamps[1],
            ]
        ];

        for ($u=2; $u <= 20; $u++) {

            // del 2 al 10 son trabajadores
            $role = User::ROLES['worker'];
            $companyId = null;
            // del 11 al 20 son empresas
            if($u >= 11){
                $role = User::ROLES['company_admin'];
                $companyId = $u - 10;
            }

            $users[$u] = [
                'id' => $u,
                'name' => $faker->name(),
                'email' => "usuario$u@email.com",
                'password' => Hash::make("12345678"),
                'email_verified_at' => null,
                'role_id' => $role,
                'company_id' => $companyId,
                'created_at' => $timestamps[$u],
                'updated_at' => $timestamps[$u],
            ];
        }
        User::insert($users);
        $output->writeln("Seed: " . count($users) . " usuarios creados.");



        ///////////////////////////////////////////////////////////
        ///////////////////////// PLACES  /////////////////////////
        //////////////////////////////////////////////////////////
        $places = PlacesSeeder::seedPlaces();


        ///////////////////////////////////////////////////////////
        /////////////////////// COMPANIES  ///////////////////////
        //////////////////////////////////////////////////////////
        $output->writeln('Seed: CREANDO COMPANIES ................');

        $companies = [];
        // del 2 al 10 son trabajadores
        for ($c=11; $c <= 20; $c++) {
            $companies[] = [
                'id' => count($companies) + 1,
                'main_user_id' => $c,
                'name' => $faker->company(),
                'phone1' => (rand(1,4) == 1) ? $faker->phoneNumber() : null,
                'phone2' => (rand(1,4) == 1) ? $faker->phoneNumber() : null,
                'address' => $faker->address(),
                'web' => (rand(1,4) == 1) ? $faker->url() : null,
                'nit' => $faker->numerify('#########'),
                'main_place_id' => $c,
                'category_id' => 1,
                'description' => $faker->text(),
                'url' => "empresa-$c",
                'status' => 1,
                'created_at' => $timestamps[$c],
                'updated_at' => $timestamps[$c],
            ];
        }

        Company::insert($companies);
        $output->writeln("Seed: " . count($companies) . " companies creados.");


        ///////////////////////////////////////////////////////////
        ////////////////////// PROFESSIONS  //////////////////////
        //////////////////////////////////////////////////////////
        $professions = ProfessionsSeeder::seedProfessions();


        ///////////////////////////////////////////////////////////
        //////////////////////// WORKERS  ////////////////////////
        //////////////////////////////////////////////////////////
        $output->writeln('Seed: CREANDO WORKERS ................');
        $workers = [];
        // del 11 al 20 son empresas
        for ($w=2; $w <= 10 ; $w++) {

            $workers[] = [
                'id' => count($workers) + 1,
                'user_id' => $w,
                'name' => $faker->name(),
                'birthday' => $faker->dateTimeBetween('-70 years', '-18 years')->format('Y-m-d'),
                'phone1' => (rand(1,4) == 1) ? $faker->phoneNumber() : null,
                'phone2' => (rand(1,4) == 1) ? $faker->phoneNumber() : null,
                'address' => $faker->address(),
                'web' => (rand(1,4) == 1) ? $faker->url() : null,
                'main_place_id' => $places->random()['id'],
                'main_profession_id' => $professions->random()['id'],
                'description' => $faker->text(),
                'url' => "candidato-$w",
                'status' => 1,
                'created_at' => $timestamps[$w],
                'updated_at' => $timestamps[$w],
            ];
        }

        Worker::insert($workers);
        $output->writeln("Seed: " . count($workers) . " workers creados.");
        $workers = collect($workers);


        ///////////////////////////////////////////////////////////
        /////////////////////// ABILITIES  ///////////////////////
        //////////////////////////////////////////////////////////
        $abilities = AbilitiesSeeder::seedAbilities();


        ///////////////////////////////////////////////////////////
        ////////////////////////// JOBS  //////////////////////////
        //////////////////////////////////////////////////////////
        $output->writeln('Seed: CREANDO JOBS ................');
        $jobs = [];
        $job_profession = [];
        $ability_job = [];
        for ($j=1; $j <= 20 ; $j++) {

            // del 11 al 20 son empresas
            $user_id = random_int(11,18);

            $jobs[$j] = [
                'id' => $j,
                'place_id' => $places->random()['id'],
                
                'company_id' => $users[$user_id]['company_id'],

                'title' => $faker->sentence(),
                'description' => $faker->text(),
                'url' => "anuncio-$j",
                'cached_profession_ids' => json_encode($profession = [$professions->random()['id']]),
                'cached_ability_ids' => json_encode($ability = [$abilities->random()['id']]),

                'experience_type_id' => random_int(1,count(Job::EXPERIENCE_TYPES)),
                'start_date' => $faker->dateTimeBetween('+2 weeks', '+2 months')->format('Y-m-d'),
                'end_date' => $faker->dateTimeBetween('+2 months', '+12 months')->format('Y-m-d'),
                'start_type_id' => random_int(1,count(Job::START_TYPES)),

                'job_type_id' => random_int(1,count(Job::JOB_TYPES)),
                'salary_min' => $salary_min = random_int(5000, 50000),
                'salary_max' => random_int(5000, 10000) + $salary_min,

                'payment_periodicity_id' => random_int(1,count(Job::PAYMENT_PERIODICITY)),
                'status' => 1,
                'created_at' => $timestamps[$j],
                'updated_at' => $timestamps[$j],
            ];

            $job_profession[$j] = [
                'id' => $j,
                'job_id' => $j,
                'profession_id' => $profession[0]
            ];
            $ability_job[$j] = [
                'id' => $j,
                'job_id' => $j,
                'ability_id' => $ability[0]
            ];
        }

        Job::insert($jobs);
        $output->writeln("Seed: " . count($jobs) . " jobs creados.");
        $output->writeln('Seeding job_profession y ability_job ................');

        DB::table('job_profession')->insert($job_profession);
        DB::table('ability_job')->insert($ability_job);
        $output->writeln("Seed: " . count($job_profession) . " job_profession creados.");
        $output->writeln("Seed: " . count($ability_job) . " ability_job creados.");

        ///////////////////////////////////////////////////////////
        ////////////////////// APPLICATIONS  //////////////////////
        //////////////////////////////////////////////////////////
        $output->writeln('Seed: CREANDO APPLICATIONS ................');
        $applications = [];
        // $table->foreignId('worker_id')->constrained('workers');
        // $table->foreignId('job_id')->constrained('jobs');
        // $table->text('worker_msg')->nullable();
        // $table->tinyInteger('status');

        for ($a=1; $a <= 5; $a++) {
            $applications[] = [
                'id' => $a,
                'worker_id' => $workers->random()['id'],
                'job_id' => $a,
                'worker_msg' => $faker->text(),
                'status' => 1,
                'created_at' => $timestamps[$a],
                'updated_at' => $timestamps[$a],
            ];
        }

        Application::insert($applications);
        $output->writeln("Seed: " . count($applications) . " applications creados.");




    }


}





