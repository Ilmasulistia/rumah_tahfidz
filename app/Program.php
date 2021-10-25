<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Program extends Model
{
    protected $primaryKey = 'program_id';
    protected $table = 'programs';
    protected $fillable = ['program_id','program_name'];
    public $incrementing = false;
    public $timestamps = false;

    public function program_detail()
    {
        return $this->hasMany(Program_detail::class, 'program_id', 'program_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'program_id' => [
                'format' => 'P?', // Format kode yang akan digunakan.
                'length' => 1 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
