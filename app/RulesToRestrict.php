<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RulesToRestrict extends Model
{
    protected $fillable = [
        'name','idTypeRestrict','amount'
    ];
}
