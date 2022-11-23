<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $rememberTokenName = false;
    public $timestamps = false;
    protected $table = 'clients';

    protected $fillable = [
        'client_name',
        'created_at',
        'status',
    ];

    protected $attributes = [
        'status' => 1
    ];
}
