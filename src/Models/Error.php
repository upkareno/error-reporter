<?php
namespace Upkareno\ErrorReporter\Models;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $fillable = [
        'message',
        'file',
        'line',
        'trace',
        'context',
        'type',
        'user_id',
        'user_agent',
        'ip',
        'created_at',
        'updated_at'
    ];
}