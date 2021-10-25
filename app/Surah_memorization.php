<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surah_memorization extends Model
{
    protected $primaryKey = 'id_memorization';
    protected $table = 'surah_memorization';
    protected $fillable = ['id_memorization','semester','year','juz', 'verse', 
    'student_id'];
    public $incrementing = false;
    public $timestamps = false;
}
