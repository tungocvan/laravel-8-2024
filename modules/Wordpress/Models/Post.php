<?php

namespace Modules\Wordpress\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Wordpress\Models\PostMeta;
class Post extends Model
{
   use HasFactory;
   protected $connection = 'wordpress';   

   protected $table =  "posts";
   protected $primaryKey = "ID";
   //protected $fillable = [];
   public $timestamps = true;
   const CREATED_AT ="post_date";
   const UPDATED_AT ="post_date_gmt";

   public function postMeta(){
        return $this->hasMany(PostMeta::class);
   }
}
 