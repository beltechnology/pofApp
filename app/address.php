<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addresses';

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
    protected $fillable = ['entityId', 'stateId', 'districtId', 'cityId', 'addressLine1', 'addressLine2','pincode', 'addressType', 'description',  'deleted', 'status',];
}

