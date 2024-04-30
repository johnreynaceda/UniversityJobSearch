<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ojtJob(){
        return $this->belongsTo(OjtJob::class);
    }

    public function employerInformation(){
        return $this->belongsTo(EmployerInformation::class);
    }
}
