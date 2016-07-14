<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'book_details';

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
    protected $fillable = ['entityId', 'classId', 'schoolId', 'sessionYear', 'noofBookFirstVisitPMO', 'noofBookFirstVisitPSO', 'noofBookLastVisitPMO', 'noofBookLastVisitPSO', 'returnBook', 'other', 'total'];
}
