<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teammember extends Model
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
    protected $fillable = ['teamId', 'teamName', 'teamLocation', 'teamLeader', 'teamCreationDate', 'teamEndDate', 'teamCode', 'description', 'deleted', 'status'];
}
