<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'place_id',
        'company_id',
        'title',
        'description',
        'url',
        'cached_profession_ids',
        'cached_ability_ids',
        'status',
        // otros atributos aquí

        'experience_type_id' ,
        'start_date',
        'end_date' ,
        'start_date',
        'end_date' ,
        'job_type_id',
        'start_type_id',
        'salary_min',
        'salary_max',
        'payment_periodicity_id' ,

    ];


    // experience_type_id
    // start_type
    // payment_periodicity_id




    public const EXPERIENCE_TYPES = [

        'no_experience' => 1,
        'less_than_one_year' => 2,
        'one_to_two_years' => 3,
        'two_to_three_years' => 4,
        'three_to_five_years' => 5,
        'five_to_ten_years' => 6,
        'more_than_ten_years' => 7,

    ];

    // public const TRANS_EXPERIENCE_TYPES = [
    //     'Sin_experiencia' => 1,
    //      'Menos_que_un_año' => 2,
    //      'Uno_a_dos_años' => 3,
    //      'Dos_a_tres_años' => 4,
    //      'Tres_a_cinco_años' => 5,
    //      'Cinco_a_diez_años' => 6,
    //      'Más_que_diez_años' => 7,
    // ];

    public const START_TYPES = [

        'immediate' => 1,
        'by_agreement' => 2,
        'by_finished_job' => 3,

    ];

    public const TRANS_START_TYPES = [

        'Inmediato' => 1,
         'Por_acuerdo' => 2,
         'Por_trabajo_terminado' => 3,

    ];

    public const JOB_TYPES = [

        'full_time' => 1,
        'part_time' => 2,
        'freelance' => 3,
        'temporary' => 4,
        'internship' => 5,
        'volunteer' => 6,

    ];

    public const TRANS_JOB_TYPES = [

        'Tiempo_completo' => 1,
        'Tiempo parcial' => 2,
        'Independiente' => 3,
        'Temporal' => 4,
        'Prácticas' => 5,
        'Voluntario' => 6,

    ];



    public const PAYMENT_PERIODICITY = [

        'hourly' => 1,
        'daily' => 2,
        'weekly' => 3,
        'biweekly' => 4,
        'monthly' => 5,
        'annually' => 6,

        'by_finished_job' => 7,

    ];

    public const TRANS_PAYMENT_PERIODICITY = [

        'Cada hora' => 1,
         'Diario' => 2,
         'Semanal' => 3,
         'Quincenal' => 4,
         'Mensual' => 5,
         'Anualmente' => 6,

         'Por_trabajo_terminado' => 7,

    ];




    public function getCachedProfessionIdsAttribute($value)
    {
        return json_decode($value);
    }

    public function profession()
        {
    return $this->belongsTo(Profession::class, 'cached_profession_ids');

        }

    public function getCachedAbilityIdsAttribute($value){
        return json_decode($value);
    }

    public function abilities(){
        return $this->belongsTo(Ability::class, 'cached_ability_ids');
    }


    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function place() {
        return $this->belongsTo(Place::class);
    }

}
