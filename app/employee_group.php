<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\Pivot;

class employee_group extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

}
