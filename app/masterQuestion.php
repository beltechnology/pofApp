<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class masterQuestion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'master_question';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'questionId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['questionNumber', 'text', 'section', 'stream', 'marks', 'questionType', 'updateCounter', 'deleted', 'status'];
}
