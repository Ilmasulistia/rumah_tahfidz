<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Management extends Model
{
    protected $primaryKey = 'management_id';
    protected $table = 'management';
    protected $fillable = ['management_id','start_periode','nik','position'];
    public $incrementing = false;
    public $timestamps = false;

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'nik', 'nik');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'management_id' => [
                'format' => 'Man-?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
