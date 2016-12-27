<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class secondLevelStudentResult extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'second_level_student_result';

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
    protected $fillable = ['questionId','answerId','studentId','correct','sessionId','stream','updateCounter','deleted','status','order','studentAnswerId'];
}
