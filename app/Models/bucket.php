<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bucket extends Model
{
    use HasFactory;

    public function getBucketName(){
        return $this->name;
    }
}
