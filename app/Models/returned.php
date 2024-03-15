<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class returned extends Model
{
    use HasFactory;
	protected $fillable = ['id_car','id_rent', 'id_user', 'name_car','start_date','finish_date','nopol','total_day','total_price'];
}
