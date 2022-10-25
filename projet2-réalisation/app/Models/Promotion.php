<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Promotion extends Model
{
    use HasFactory;
    // protected $table='promotions';
    protected $fillable=['id','name'];
    // public $timestamps=true;

    public function students(){
        return $this->hasMany(Student::class,'PromotionID','id');
    }
}
