<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class special_prize extends Model
{
    use HasFactory;
    public $timestamp = true;
    protected $fillable = ['first_digit', 'second_digit', 'thrid_digit', 'fourth_digit', 'fifth_digit', 'six_digit'];
}
