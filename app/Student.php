<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Student extends Model
{
    protected $primaryKey = 'student_id';
    protected $table = 'students';
    protected $fillable = ['student_id','name','gender','school_name', 'address', 
    'birth_place','birth_date','parents_name','phone_no', 'parent_occupation','tuition_fee','join_date'];
    public $incrementing = false;
    public $timestamps = false;

    public function student_assessment()
    {
        return $this->hasMany(Student_assessment::class, 'student_id', 'student_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'student_id' => [
                'format' => 'S?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }

}
