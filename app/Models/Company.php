<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'phone1' ,
        'phone2',
        'address' ,
        'web',
        'description',
        'url',
        'status' ,
        'nit' ,
        'main_place_id' ,
        'category_id',
        'main_user_id'
    ];


    const CATEGORY = [
        'construcción' => 1,
        'arquitectura' => 2,
        'pinturería' => 3,
    ];


    public function place()
    {
        return $this->belongsTo(Place::class, 'main_place_id');
    }

    public function myCategory()
    {
        return array_search($this->category_id, self::CATEGORY);
    }


}
