<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'bread_name',
        'temperament',
        'lifespan',
        'avg_weight_female',
        'avg_weight_male',
        'coat_type',
        'coat_density',
    ];
}
