<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ComplaintAssignmentHistory extends Model
{
    use HasUuids;

    protected $primaryKey = 'assignment_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'organisation_id',
        'complaint_id',
        'assigned_to_user_id',
        'assigned_by_user_id',
        'assigned_at',
        'note'
    ];
}
