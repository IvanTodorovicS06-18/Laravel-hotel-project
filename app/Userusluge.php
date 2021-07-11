<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Userusluge extends Pivot
{

    protected $fillable = ['user_id', 'uslugehotela_id'];
}
