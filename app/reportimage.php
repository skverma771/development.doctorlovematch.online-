<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportimage extends Model
{
    public $table="reportimages";
    protected $fillable = ['user_id','member_id','image_url','type'];

}
