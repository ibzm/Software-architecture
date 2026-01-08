<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Complaint extends Model
{
    use HasUuids;

    protected $primaryKey = 'complaint_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'organisation_id',
        'reference_no',
        'category',
        'description',
        'status',
        'assigned_to_user_id'
    ];
}
