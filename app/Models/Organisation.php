<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Organisation extends Model
{
    use HasUuids;

    protected $primaryKey = 'organisation_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['name'];
}
