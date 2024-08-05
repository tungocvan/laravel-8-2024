<?php

namespace Modules\Wordpress\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    use HasFactory;
   protected $connection = 'wordpress';
   protected $table = "postmeta";
   protected $primaryKey = "meta_id";
   //protected $fillable = [];
   public $timestamps = false;
   //const CREATED_AT ="created_at";
   //const UPDATED_AT ="updated_at";
}
