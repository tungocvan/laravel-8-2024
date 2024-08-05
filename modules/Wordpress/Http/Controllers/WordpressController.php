<?php

namespace Modules\Wordpress\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Wordpress\Models\Post;

class WordpressController extends Controller
{  
    
    public function index()
    {
        // $Wordpress=$this->WordpressRepo->getAll();
        // or user WordpressRepository
        
        // $title='Wordpress View index.blade.php';
        // return view('Wordpress::index',compact('title'));
        return getUrlView('Wordpress');
    }
public function list(){ 
     
    $allPost = Post::paginate(10);
    dd($allPost);
    return getUrlView('wordpress/list');
}
}