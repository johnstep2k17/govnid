<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $table = 'audit_logs';

    protected $fillable = [
        'user_id', 'action', 'details',
    ];

    protected $casts = [
        'details' => 'array',   // can pass array; auto-JSON
    ];
}
