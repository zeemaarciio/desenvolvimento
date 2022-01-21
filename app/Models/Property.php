<?php

namespace DevImobiliaria\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $fillable = ['title', 'url', 'description', 'rental_price', 'sale_price'];

    public $timestamps = false;
}
