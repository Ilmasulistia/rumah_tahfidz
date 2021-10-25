<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_assessment_detail extends Model
{
    protected $primaryKey = ['student_id', 'class_id'];
    protected $table = 'student_assessment_details';
    protected $fillable = ['student_id','class_id','number', 'affective', 
    'detail_id'];
    public $incrementing = false;
    public $timestamps = false;

    public function program_detail()
    {
        return $this->belongsTo(Program_detail::class, 'detail_id', 'detail_id');
    }
}
