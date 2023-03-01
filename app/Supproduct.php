<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supproduct extends Model
{
    protected $table = 'subproducts';
    protected $fillable =['name','price','code'];
}
