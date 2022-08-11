<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Daily_assessment extends Model
{
    protected $primaryKey = 'daily_assessment_id';
    protected $table = 'daily_assessments';
    protected $fillable = ['daily_assessment_id','student_assessment_id', 'date_of_recitation','status', 'information', 'juz_no'];
    public $incrementing = false;
    public $timestamps = false;


    public function sura() {
        return $this->belongsTo(Sura::class, 'juz_no', 'juz_no');
    }
    public function student_assessment() {
        return $this->belongsTo(Student_assessment::class, 'student_assessment_id', 'student_assessment_id');
    }

    public function oldest()
    {
        return $this->hasOne(Student_assessment::class)->oldestOfMany();
    }


    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'daily_assessment_id' => [
                'format' => 'D-?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
    
}
