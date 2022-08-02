<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sura extends Model
{
    protected $primaryKey = 'juz_no';
    protected $table = 'suras';
    protected $fillable = ['juz_no'];
    public $incrementing = false;
    public $timestamps = false;

    public function daily_assessment()
    {
        return $this->hasMany(Daily_assessment::class, 'juz_no', 'juz_no');
    }
    public function page() {
        return $this->hasMany(Page::class, 'juz_no', 'juz_no');
    }
}
