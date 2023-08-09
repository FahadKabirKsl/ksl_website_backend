<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipo extends Model
{
    use HasFactory;
    protected $fillable=[
        'company_name',
        'company_platform',
        'company_about',
        'founded',
        'managing_director',
        'parent_organization',
        'minimum_invest',
        'cutt_off_date',
        'minimum_application_amount',
        'total_share',
        'eps',
        'nav',
        'rate',
        'type',
        'start_date',
        'end_date',
        'listed_on',
        'list_price',
        'list_gains',
        'offer_price',
        'cupon_rate',
        'key_highlights',
        'status'
    ];
}
