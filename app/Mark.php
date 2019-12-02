<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['studentId','subjectId','mark'];

    public function subject(){
        return $this->belongsTo(Student::class);
    }
}
