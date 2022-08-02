<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Student_assessment_detail extends Model
{
    protected $primaryKey = ['student_assessment_detail_id'];
    protected $table = 'student_assessment_details';
    protected $fillable = ['student_assessment_detail_id','student_assessment_id','number', 'status', 
    'detail_id'];
    public $incrementing = false;
    public $timestamps = false;

    public function program_detail()
    {
        return $this->belongsTo(Program_detail::class, 'detail_id', 'detail_id');
    }
    public function student_assessment() {
        return $this->belongsTo(Student_assessment::class, 'student_assessment_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'student_assessment_detail_id' => [
                'format' => 'sa?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
