<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerInformation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ojtjobs(){
        return $this->hasMany(OjtJob::class);
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }
}
