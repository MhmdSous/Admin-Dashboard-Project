<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Concerns\ManagesSubscriptions;

class Plan extends Model
{
    use HasFactory;
    use Billable;
    use ManagesSubscriptions;
    
    protected $fillable = [
        'name',
        'slug',
        'stripe_plan',
        'price',
        'description',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
