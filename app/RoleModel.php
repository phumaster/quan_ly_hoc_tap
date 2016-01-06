<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'roles';

    protected $fillable = ['role_title', 'role_except_url', 'users_id'];

    public $timestamps = false;
}
