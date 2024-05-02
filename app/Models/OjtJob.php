<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OjtJob extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employerInformation(){
        return $this->belongsTo(EmployerInformation::class);
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }

    public function workEnvironment(){
        return $this->belongsTo(WorkEnvironment::class);
    }
}
