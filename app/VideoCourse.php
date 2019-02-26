<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class VideoCourse extends Model
{
    use Sortable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'video_courses';
				
    /**
    * Field to be mass-assigned.
    *
    * @var array
    */
    protected $fillable = [
        'id',
        'subject_id',
        'title',
        'file_name',
        'description'
    ];
    
    /**
     * Get the subject record associated with the video course.
     */
    public function subject()
    {
        return $this->hasOne('App\Subject', 'id', 'subject_id');
    }

    public $sortable = ['created_at'];
}
