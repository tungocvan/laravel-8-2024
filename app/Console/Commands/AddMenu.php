<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;
use Modules\Users\src\Models\UserMeta;

class AddMenu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:menu {link} {--delete}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $option = $this->option('delete');
        $links = explode('/',$this->argument('link'));
        if(count($links) == 2){
            $module = ucfirst($links[0]);
            $route = $links[1];
            $pathModule = base_path('modules/' . $module);

            if (File::exists($pathModule)){  
                $destView = $pathModule."/Resources/views/phoenix/parts/".strtolower($route)."-content.blade.php";
                if($option){
                    $this->error('chọn xóa');
                    if (File::exists($destView)) {
                        // File::delete($destView);
                        
                    }

                }else{
                    $viewPath = base_path("app/Console/Commands/template");
                    $sourceTmpView = $viewPath ."/phoenix/parts/tmp-content.blade.php"; 
                    
                    if (File::exists($destView)) {
                        $this->error("Đã tồn tại links:$module/$route" );
                        return;
                    }
                    File::copy($sourceTmpView, $destView);
                    
                    $controller = $pathModule."/Http/Controllers/".$module."Controller.php";
                    $stringToAppendController = "public function ".$route."(){ return getUrlView('".$links[0]."/$route');}";
                    $fileContents = file_get_contents($controller);
                    $newContents = substr_replace($fileContents, $stringToAppendController . "\n}", strrpos($fileContents, '}'), 1);
                    file_put_contents($controller, $newContents);
                    
                    $web = $pathModule."/Routes/web.php";
                    $stringToAppend ="Route::get('/".strtolower($route)."', [".$module."Controller::class, '".strtolower($route)."'])->name('".strtolower($route)."')->can('view',".$module."::class);";
                    $fileContents = file_get_contents($web);
                    $newContents = str_replace('});', "    $stringToAppend\n});", $fileContents);
                    file_put_contents($web, $newContents);
                    $this->info("Đã cập nhật xong route link: $module/$route");
                }
            }else{
                $this->error('Module không tồn tại');
            }    
        }else{
            $this->error('Link không hợp lệ');
        }
        
        
    }
   
}
