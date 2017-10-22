<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
        'idCustomer','idTypeTransactions', 'amount',
    ];
}

 ?>