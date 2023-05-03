<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'isbn',
        'title',
        'year',
        'publisher_id',
        'author_id',
        'catalog_id',
        'qty',
        'price',
    ];

    public function publisher()
    {
        return $this->belongsTo('App\Models\publisher', 'publisher_id');
    }
    public function Author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id');
    }
    public function Catalog()
    {
        return $this->belongsTo('App\Models\Catalog', 'catalog_id');
    }
}
