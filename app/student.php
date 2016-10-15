<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

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
    protected $fillable = ['entityId','schoolEntityId','sessionYear','studentName', 'fatherName', 'dob', 'classId', 'section', 'pmo', 'pso', 'handicapped', 'rollNo','deleted','status','totalMarksPmo','totalMarksPso'];
}
