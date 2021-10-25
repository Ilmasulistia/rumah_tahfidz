<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_assessment extends Model
{
    protected $primaryKey = ['student_id', 'class_id'];
    protected $table = 'student_assessments';
    protected $fillable = ['student_id','class_id','number_of_memorization', 'behavior', 
    'dilligence','neatness','ibadah', 'note', 'class'];
    public $incrementing = false;
    public $timestamps = false;

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
    public function classes() {
        return $this->belongsTo(Classes::class, 'class_id', 'class_id');
    }
    public function daily_assessment() {
        return $this->hasMany(Daily_assessment::class, ['student_id', 'student_id'],['class_id','class_id']);
    }
}
