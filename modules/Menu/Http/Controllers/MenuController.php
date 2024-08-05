<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Menu\Models\Menu;
use File;
use Illuminate\Support\Facades\Artisan;
use Modules\Menu\Repositories\MenuRepositoryInterface;
// use Modules\Menu\Repositories\MenuRepository;
class MenuController extends Controller
{  
    protected $MenuRepo;
    protected $filePath = 'storage/json/menu.json';
    public function __construct(MenuRepositoryInterface $MenuRepo)
    {
       // $this->middleware("auth");       
       $this->MenuRepo = $MenuRepo;
    }
    public function index()
    {
        // $Menu=$this->MenuRepo->getAll();
        // or user MenuRepository
        // $Menu = new MenuRepository();
        
        // $title='Menu View index.blade.php'; 
        // return view('Menu::index',compact('title'));
        //dd(public_path($this->filePath));
        if (!File::exists(public_path($this->filePath))) {
            File::put(public_path($this->filePath), json_encode([]));
        }

        $jsonContent = File::get(public_path($this->filePath));
        $data = json_decode($jsonContent, true);        
        //dd($data);
        return getUrlView('menu',compact('data'));
    }
    public function menuAdd(Request $request)
    {
        // $Menu=$this->MenuRepo->getAll();
        // or user MenuRepository
        // $Menu = new MenuRepository();
        
        // $title='Menu View index.blade.php'; 
        // return view('Menu::index',compact('title'));
        $filePath = base_path('public/storage/json/menu.json');
        $jsonArray = importJsonFile($filePath);

        $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
        $id = isset($_POST['id']) ? (int)$_POST['id'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $parent_id = isset($_POST['parent_id']) ? (int)$_POST['parent_id'] : '';
        $href = isset($_POST['href']) ? $_POST['href'] : '';
        $iconClass = isset($_POST['iconClass']) ? $_POST['iconClass'] : '';

        $newEntry = [
            'id' => $id,
            'title' => $title,
            'parent_id' => $parent_id,
            'href' => $href,
            'iconClass' => $iconClass
        ];

        //dd($newEntry);
        if (!isset($jsonArray[$menu_name])) {
            $jsonArray[$menu_name] = [];
        }
    
        $jsonArray[$menu_name][] = $newEntry;    
        saveJsonFile($filePath, $jsonArray);       
        // $route = substr($href, 1);
        // $links = explode('/',$route);
        // if(count($links) == 2){
        //     $module = ucfirst($links[0]);
        //     $pathModule = base_path('modules/' . $module);
        //     if (File::exists($pathModule)) {
        //         Artisan::call('create:menu', [
        //             'link' => strtolower($route),                    
        //         ]);
        //     }
        // }
        return redirect('menu');
    }
    public function add()
    {
        // $Menu=$this->MenuRepo->getAll();
        // or user MenuRepository
        // $Menu = new MenuRepository();
        
        // $title='Menu View index.blade.php'; 
        // return view('Menu::index',compact('title'));
        return getUrlView('menu/add');
    }
    public function delete(Request $request)
    {
        
        $data = $request->input('jsonData');

        if (json_decode($data, true) === null) {
            return response()->json(['error' => 'Invalid JSON data.'], 400);
        }

        File::put(public_path($this->filePath), $data);

        //return response()->json(['success' => 'Data saved successfully.']);
        return 'Data saved successfully.';
       
    }    
}