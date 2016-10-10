<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questionSet extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'question_sets';

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
    protected $fillable = ['questionId','set', 'updateCounter', 'status', 'deleted'];
}
