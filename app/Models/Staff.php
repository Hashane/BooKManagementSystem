<?php

namespace App\Models;

use App\Models\User;

class Staff extends User
{
    protected $guard = 'staff';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_id',
        'department',
        'position',
    ];
}
