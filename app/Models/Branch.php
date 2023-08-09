<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_name',
        'branch_address',
        'branch_helpline_1',
        'branch_helpline_2',
        'branch_email'
    ];
}
