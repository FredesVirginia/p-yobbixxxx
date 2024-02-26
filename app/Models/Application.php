<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
       'job_id',
       'worker_id',
        'worker_msg',
        'status'

    ];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }


}
