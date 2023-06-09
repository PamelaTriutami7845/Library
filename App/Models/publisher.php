<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publisher extends Model
{
    use HasFactory;
    protected $table = 'publishers';
    protected $fillable = ['name', 'email', 'phone_number', 'address'];

    public function books()
    {
        return $this->hasMany('App\Models\book', 'publisher_id');
    }
}
