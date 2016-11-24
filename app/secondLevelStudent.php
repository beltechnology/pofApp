<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class secondLevelStudent extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'secondlevelstudent';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'secondLevelId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['studentEntityId', 'SecondLevelSchoolId', 'deleted', 'stream',];
}
