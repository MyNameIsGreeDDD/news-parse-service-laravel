<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParseLink extends Model
{
    use HasFactory;

    protected $fillable = ['link'];

    public $timestamps = false;

    protected $table = 'parse_links';
}
