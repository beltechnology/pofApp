<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emailaddress extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'emailaddresses';

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
    protected $fillable = ['entityId', 'email', 'emailType', 'description', 'deleted', 'status',];
}

