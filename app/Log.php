<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = "log";
    protected $fillable = [
        'process_name',
        'severity',
        'additional_info',
        'created_at',
        'updated_at'
    ];

}
