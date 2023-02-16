<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogRequest extends Model
{
    use HasFactory;

    protected $fillable = ['datetime', 'request_method', 'url', 'http_code', 'body', 'execution_time'];

    public $timestamps = false;

    protected $table = 'log_requests';
}
