<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrizeList extends Model
{
    use HasFactory;
    public $timestamp = true;
    protected $fillable = ['first_prize', 'second_prize', 'thrid_prize', 'consolation_prize_id', 'special_prize'];
}
