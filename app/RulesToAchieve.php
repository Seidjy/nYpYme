<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RulesToAchieve extends Model
{
    protected $fillable = [
        'name', 'idTypeAchieve', 'amount','gather'
    ];
}
