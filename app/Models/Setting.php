<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;


    protected $fillable = [
        'default_check_in_hours',
        'default_check_out_hours',
        'company_email_address',
        'company_email_address_2',
        'company_phone_number',
        'company_phone_number_2',
        'company_address',
    ];
}
