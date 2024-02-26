<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public const ROLES = [

        'user' => 1,


        // workers 2-9
        'worker' => 2,


        // companies 11-19
        'company_admin' => 11,


        // ADMIN
        'admin' => 33,
    ];

    // use $this->middleware('role:admin'); or $this->middleware('role:admin,designer');
    // or in blade Auth::user()?->isRole('admin')
    // ADDED: use --company for all company roles or --worker for all worker roles
    public function isRole($roles){

        if( $this->role_id == User::ROLES['admin'] ) return true;

        if( str_starts_with($roles,'--') ){
            if($roles == '--company'){
                return $this->isCompany();
            }
            if($roles == '--worker'){
                return $this->isWorker();
            }
            return false;
        }

        $roles_arr = explode(",", $roles);
        $myRole = array_search ( $this->role_id , User::ROLES );

        if( in_array( $myRole , $roles_arr ) ){
            return true;
        }

        return false;
    }

    public function myRole(){
        return array_search ( $this->role_id , User::ROLES );
    }

    public function isWorker(){
        return ( $this->role_id >= 2 && $this->role_id <= 9 );
    }

    public function isCompany(){
        return ( $this->role_id >= 11 && $this->role_id <= 19 );
    }


    public function worker()
    {
        return $this->hasOne(Worker::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}

