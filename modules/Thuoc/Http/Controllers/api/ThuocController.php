<?php

namespace Modules\Thuoc\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Thuoc\Models\Thuoc;

class ThuocController extends Controller
{  
    public function __construct()
    {
       // $this->middleware("auth");
    }
    public function index()    {
        
        return [
            'status' => 200
        ];
    }
}