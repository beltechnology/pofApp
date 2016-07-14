<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';

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
    protected $fillable = ['entityId','sessionYear', 'posterDistributionDate', 'closingDate', 'formNo', 'schoolName', 'principalName', 'principalMobile' ,'principalEmail', 'firstCoordinatorName', 'firstCoordinatorMobile', 'firstCoordinatorEmail', 'secondCoordinator', 'secondCoordinatorMobile', 'secondCoordinatorEmail', 'PMOExamDate', 'PSOExamDate', 'schoolcode', 'uniqueSchoolCode', 'teamCode', 'employeeCode', 'schoolTotalStrength', 'classStrength', 'followUpDate', 'callStatus', 'posterDistributed', 'KMS', 'remarks'];
}
