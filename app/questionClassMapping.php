<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class questionClassMapping extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questionClassMapping';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'classMapId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['classId','setId','masterSetId','questionId','updateCounter','deleted','status','order'];
}
