<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleConfig extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_configs';

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
    protected $fillable = ['designationId', 'moduleType', 'name', 'image', 'muduleLink', 'activeData', 'title', 'text'];
}
