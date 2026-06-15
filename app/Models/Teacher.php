<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
        protected $fillable = [
        "name",
        "email",
        "specialization",
        "phone",
        "classroom_id",
    ];

       public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
}
