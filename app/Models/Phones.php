<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
    use HasFactory;
    protected $fillable = ['brand', 'model', 'price', 'produced_date', 'color', 'memory_limit'];
}
