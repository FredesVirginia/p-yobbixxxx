<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthday',
        'phone1',
        'phone2',
        'address',
        'web',
        'main_profession_id',
        'main_place_id',
        'description',
        'url',
        'status',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class, 'main_place_id');
    }

    public function applications()
    {
        return $this->belongsTo(Application::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'main_profession_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
