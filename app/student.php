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
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['studentName', 'fatherName', 'dob', 'class', 'section', 'pmo', 'pso', 'handicapped', 'rollNo'];
}
