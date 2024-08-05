<?php

namespace Modules\Help\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Help\Models\Help;
use Modules\Help\Repositories\HelpRepositoryInterface;
// use Modules\Help\Repositories\HelpRepository;
class HelpController extends Controller
{  
    protected $HelpRepo;
    public function __construct(HelpRepositoryInterface $HelpRepo)
    {
       // $this->middleware("auth");       
       $this->HelpRepo = $HelpRepo;
    }
    public function index()
    {
        // $Help=$this->HelpRepo->getAll();
        // or user HelpRepository
        // $Help = new HelpRepository();
        
        // $title='Help View index.blade.php';
        // return view('Help::index',compact('title'));
        return getUrlView('Help');
    }
    public function backup()
    {
        return getUrlView('Help/backup');
    }
}