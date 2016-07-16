<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments';

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
    protected $fillable = ['entityId', 'schoolId', 'sessionYear', 'paymentModeId', 'examLevelId', 'paymentDate','modeRefNo', 'paymentStatus','deleted','status'];
}
