<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $primaryKey = 'role_id';
    protected $table = 'roles';
    protected $fillable = ['role_id','name'];
    public $incrementing = false;
    public $timestamps = false;

    public function user(){
        return $this->hasMany(User::class);
    }
}
