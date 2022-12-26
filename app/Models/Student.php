<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    // protected $table ='tb_student';
    // protected $primaryKey = 'student_id';
    // public $timestamps = false;

    public function rPhone(){
        return $this->hasOne(Phone::class);
    }

    public function rPhones(){
        return $this->hasMany(Phone::class);
    }
}
 