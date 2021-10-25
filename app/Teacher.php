<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $primaryKey = 'nik';
    protected $table = 'teachers';
    protected $fillable = ['nik','name','address','phone_no'];
    public $incrementing = false;
    public $timestamps = false;

    public function management()
    {
        return $this->hasMany(Management::class, 'nik', 'nik');
    }
    public function classes()
    {
        return $this->hasMany(Classes::class, 'nik', 'nik');
    }
 
}
