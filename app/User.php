<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cache;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'role_id', 'username', 'email', 'password', 
    ];
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    private $have_role;

    public function role() {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
    public function student() {
        return $this->hasOne(Student::class, 'student_id', 'user_id');
    }
    public function teacher() {
        return $this->hasOne(Teacher::class, 'nik', 'user_id');
    }
   

    public function status(){
        return Cache::has('user-is-online-' . $this->user_id);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
