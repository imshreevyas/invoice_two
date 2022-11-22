<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    
    protected $rememberTokenName = false;
    public $timestamps = false;
    protected $table = 'invoices';

    protected $fillable = [
        'client_name',
        'invoice_no',
        'invoice_date',
        'po_date',
        'bill_to',
        'ship_to',
        'po_details',
        'product_details',
        'notes',
        'created_at',
        'status',
    ];
    
    protected $attributes = [
        'status' => 1
    ];
}
