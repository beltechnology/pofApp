<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'phones';

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
    protected $fillable = ['phoneId', 'entityId', 'phoneNumber', 'phoneType', 'deleted', 'status',];
}

