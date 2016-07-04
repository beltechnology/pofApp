<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entity extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'entitys';

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
    protected $fillable = ['entityId','name'];

}
