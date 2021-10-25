<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Classes extends Model
{
    protected $primaryKey = 'class_id';
    protected $table = 'class';
    protected $fillable = ['class_id','semester','year','nik', 'course_id'];
    public $incrementing = false;
    public $timestamps = false;

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'nik', 'nik');
    }
    public function course(){
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
    public function student_asssessment()
    {
        return $this->hasMany(Student_asssessment::class, 'class_id', 'class_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'class_id' => [
                'format' => 'Cl?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
