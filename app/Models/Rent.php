<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
		protected $fillable = ['id_car', 'id_user', 'name_car','start_date','end_date','total_days','price','total_price'];
}
