<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employees';

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
    protected $fillable = ['employeeId', 'entityId', 'dateOfJoining','dob','sessionYear','designation','employeeLocation', 'employeeCode', 'description', 'deleted', 'status',];
}
