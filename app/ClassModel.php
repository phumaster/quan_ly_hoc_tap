<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'class';

    protected $fillable = ['class_name', 'class_info', 'grades_id'];

    public $timestamps = false;
}
