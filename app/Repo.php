<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repo extends Model
{
    //
    protected $table = 'repos';

    protected $fillable = ['id_repo','name','owner','fecha_creacion','fecha_commit'];
}
