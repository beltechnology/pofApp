<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'locationId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['state_id','district_id','city_id','location', 'deleted', 'status'];
}
