<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class firstLevel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'first_levels';

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
    protected $fillable = ['entityId', 'schoolId', 'sessionYear', 'examLevelId', 'reportTime', 'examStartTime', 'examEndTime', 'deleted', 'status'];
}
