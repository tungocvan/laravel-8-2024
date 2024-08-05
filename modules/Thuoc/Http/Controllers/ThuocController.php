<?php

namespace Modules\Thuoc\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Thuoc\Models\Thuoc;
use Modules\Thuoc\Repositories\ThuocRepositoryInterface;
// use Modules\Thuoc\Repositories\ThuocRepository;
class ThuocController extends Controller
{  
    protected $ThuocRepo;
    public function __construct(ThuocRepositoryInterface $ThuocRepo)
    {
       // $this->middleware("auth");       
       // $this->ThuocRepo = $ThuocRepo;
    }
    public function index()
    {
        // $Thuoc=$this->ThuocRepo->getAll();
        // or user ThuocRepository
        // $Thuoc = new ThuocRepository();
        
        $title='DASHBOARD';
        return view('Thuoc::index',compact('title'));
        //return getUrlView('Thuoc');
        //return 'Thuoc';
    }   
    public function login(){ 
        $title='Login';
        if(\Cache::get('auth-my')){       
            return  redirect('thuoc');
        }    
        return view('Thuoc::login',compact('title'));
    }
    public function trungthau(){ 
        $title='TRA CỨU THUỐC TRÚNG THẦU';         
        return view('Thuoc::trungthau',compact('title'));
    }
    public function loginPost(Request $request){ 
        
        $user = [];
        $user['email'] = $request->email;
        $user['password'] = $request->password;
        if($request->email == 'tungocvan@gmail.com' && $request->password == '123'){
            Cache::put('auth-my',$request->email, 3600); 
            return  redirect('thuoc');            
        }
        //dd($user);
       
        $title='Login';
        return view('Thuoc::login',compact('title','user'));
    }
    public function register(){ 
        $title='Register';
        return view('Thuoc::register',compact('title'));
    }
    public function forgot(){ 
        $title='Forgot';
        return view('Thuoc::forgot',compact('title'));
    }
    
}