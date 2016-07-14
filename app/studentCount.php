<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentCount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student_counts';

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
    protected $fillable = ['entityId', 'schoolId', 'classId', 'sessionYear', 'noofstudentPMO', 'noofstudentPSO', 'handicapped','deleted','status'];
}
