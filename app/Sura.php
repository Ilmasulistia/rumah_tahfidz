<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sura extends Model
{
    protected $primaryKey = 'surah_no';
    protected $table = 'suras';
    protected $fillable = ['surah_no','surah_name'];
    public $incrementing = false;
    public $timestamps = false;

    public function daily_assessment()
    {
        return $this->hasMany(Daily_assessment::class, 'surah_no', 'surah_no');
    }

}
