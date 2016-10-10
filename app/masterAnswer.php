<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class masterAnswer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'master_answer';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'answerId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['answerText','updateCounter','deleted','status',];
}
