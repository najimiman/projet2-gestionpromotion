<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promotion;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $fillable=[
        'id',
        'First_name',
        'Last_name',
        'Email'
    ];
    
    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }
}
