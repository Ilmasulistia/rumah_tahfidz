<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Course extends Model
{
    protected $primaryKey = 'course_id';
    protected $table = 'courses';
    protected $fillable = ['course_id','course_name'];
    public $incrementing = false;
    public $timestamps = false;

    public function classes()
    {
        return $this->hasMany(Classes::class, 'course_id', 'course_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'course_id' => [
                'format' => 'C-?', // Format kode yang akan digunakan.
                'length' => 1 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
