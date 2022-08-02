<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Student_assessment extends Model
{
    protected $primaryKey = 'student_assessment_id';
    protected $table = 'student_assessments';
    protected $fillable = ['student_assessment_id','student_id','class_id','number_of_memorization', 'behavior', 
    'dilligence','neatness','ibadah', 'note', 'class','status','condition'];
    public $incrementing = false;
    public $timestamps = false;

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
    public function classes() {
        return $this->belongsTo(Classes::class, 'class_id', 'class_id');
    }
    public function daily_assessment() {
        return $this->hasMany(Daily_assessment::class, 'student_assessment_id', 'student_assessment_id');
    }
    public function student_assessment_detail() {
        return $this->hasMany(Student_assessment_detail::class, 'student_assessment_id', 'student_assessment_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'student_assessment_id' => [
                'format' => 'St?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
