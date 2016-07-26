<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fees';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'entityId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['entityId','schoolId','sessionYear','examLevelId','totalAmount','otherExpenses','studentsFees','restAmount','receivedAmount','deleted','status'];
}
