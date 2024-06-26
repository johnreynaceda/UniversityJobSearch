<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkEnvironment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ojtJobs(){
        return $this->hasMany(OjtJob::class);
    }
}
