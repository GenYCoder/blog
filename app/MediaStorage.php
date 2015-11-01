<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaStorage extends Model
{
    protected $table = "mediastorage";
	protected $fillable = [
    	"filename",
    	"filesize",
    	"filelocation",
    	"ip",
    	"isDeleted"
    ];
    
}
