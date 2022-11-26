<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    
    protected $rememberTokenName = false;
    public $timestamps = false;
    protected $guard = 'vendor';
    protected $table = 'vendors';

    protected $fillable = [
        'username',
        'company_name',
        'logo',
        'email',
        'password',
        'office_no',
        'other_no',
        'office_address',
        'other_address',
        'other_address',
        'bank_details',
        'swift_bank_details',
        'city',
        'state',
        'last_login_ip',
        'last_login_time',
        'reset_pass',
        'created_at',
        'status',
    ];

    protected $hidden = [
        'password'
    ];

    protected $attributes = [
        'status' => 1
    ];
}
