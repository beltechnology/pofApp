<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class masterSet extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'master_set';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'resultId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['setName','updateCounter','deleted','status'];
}
