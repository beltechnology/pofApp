<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondLevelExam extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'second_level_exams';

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
    protected $fillable = ['examType', 'dateOfExam', 'reportingTime', 'examTime'];
}
