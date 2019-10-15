<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessLog extends Model
{
    use SoftDeletes;
    protected $table = 'process_log';
    protected $fillable = [
        'process_id',
        'start_time',
        'end_time',
        'runtime',
        'state',
        'rows_processed'
    ];

    public function process()
    {
        return $this->hasOne('App/Models/Process');
    }

}
