<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answerKey extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'answer_key';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'answerKeyId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['questionId','answerId','classMapId','updateCounter','deleted','status',];
}
