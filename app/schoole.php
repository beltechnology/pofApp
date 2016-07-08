<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schoole extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schooles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['session', 'distributionDate', 'clossingDate', 'formNo', 'schoolCode', 'uniqueSchoolCode', 'teamcode', 'employeeNo', 'employeeConNo', 'principalName', 'pmo_psoIncharge', 'pmoExmDate', 'psoExmDate', 'deleted', 'status'];
}
