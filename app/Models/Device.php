<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    public function owner(){

        return $this->hasmany(Owner::class);
    }
    public function getRouteKeyName(){
        return 'name'; 
    }
}
