<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $primaryKey = 'page_no';
    protected $table = 'pages';
    protected $fillable = ['page_no','Bagian 1', 'Bagian 2', 'Bagian 3','juz_no'];
    public $incrementing = false;
    public $timestamps = false;

    public function sura()
    {
        return $this->belongsTo(Sura::class, 'juz_no', 'juz_no');
    }
   
}
