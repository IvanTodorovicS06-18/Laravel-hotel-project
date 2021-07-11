<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Userminibar extends Pivot
{
    protected $fillable = ['user_id', 'minibar_id'];
}
