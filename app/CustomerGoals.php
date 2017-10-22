<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerGoals extends Model
{
	protected $fillable = [
        'idGoals', 'idCustomers', 'amount',
    ];
}
