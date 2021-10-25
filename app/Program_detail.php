<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Program_detail extends Model
{
    protected $primaryKey = 'detail_id';
    protected $table = 'program_details';
    protected $fillable = ['detail_id','materi','program_id'];
    public $incrementing = false;
    public $timestamps = false;

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }
    public function student_assessment_detail()
    {
        return $this->hasMany(Student_assessment_detail::class, 'detail_id', 'detail_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'detail_id' => [
                'format' => 'D?', // Format kode yang akan digunakan.
                'length' => 2 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
