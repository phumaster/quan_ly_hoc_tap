<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';

    protected $fillable = ['grade_name', 'grade_info'];

    public $timestamps = false;
}
