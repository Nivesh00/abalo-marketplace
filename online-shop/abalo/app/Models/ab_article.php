<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ab_article extends Model
{
    use HasFactory;

    protected $table = 'ab_article';
    public $primaryKey = 'id';
    public $timestamps = false;
}
