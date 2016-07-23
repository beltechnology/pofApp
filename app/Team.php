<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teams';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'teamId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['teamId', 'teamName','cityId', 'teamLocation', 'teamLeader', 'teamCreationDate', 'teamEndDate', 'teamCode', 'description', 'deleted', 'status'];
}
