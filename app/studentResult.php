<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class studentResult extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student_result';

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
    protected $fillable = ['questionId','answerId','studentId','correct','sessionId','stream','updateCounter','deleted','status','order'];
}
