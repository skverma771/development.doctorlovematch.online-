<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportaproblem extends Model
{
    public $table="reportaproblem";
    protected $fillable = ['user_id','problem'];
}
