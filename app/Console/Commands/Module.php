<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use File;
use Illuminate\Support\Facades\Artisan;

class Module extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make {name} {--delete}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Module CLI';

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
        $name = ucfirst($this->argument('name'));
        $option = $this->option('delete');
        $pathModule = base_path('modules/' . $name);
        if($option){
            if (File::exists($pathModule)) {
                File::deleteDirectory($pathModule);
                Artisan::call('module:remove-middleware', [
                    'name' => strtolower($name),                    
                ]);
                Artisan::call('observers:remove', [
                    'name' => strtolower($name),                    
                    'module' => null
                ]);
                Artisan::call('module:repositories', [
                    'module' => strtolower($name),
                    '--delete' => true
                ]);
                Artisan::call('module:make-policy', [
                    'module' => strtolower($name),
                    '--delete' => true
                ]);
                $this->info('Module delete success');
            }
        }else{
            if (File::exists($pathModule)) {
                $this->error('Module da ton tai');
            } else {
                $moduleDir = [
                    $name,
                    $name.'/Config',
                    $name.'/Console',
                    $name.'/Database',
                    $name.'/Database/factories',
                    $name.'/Database/migrations',
                    $name.'/Database/Seeders',
                    $name.'/Entities',
                    $name.'/Events',
                    $name.'/Listeners',
                    $name.'/Helpers',
                    $name.'/Http',
                    $name.'/Http/Controllers',
                    $name.'/Http/Controllers/api',
                    $name.'/Http/Middleware',
                    $name.'/Http/Requests',
                    $name.'/Models',
                    $name.'/Observers',
                    $name.'/Policies',
                    $name.'/Providers',
                    $name.'/Repositories',
                    $name.'/Resources',
                    $name.'/Resources/assets',
                    $name.'/Resources/lang',
                    $name.'/Resources/views',
                    $name.'/Resources/views/phoenix',
                    $name.'/Resources/views/phoenix/parts',
                    $name.'/Routes'
                ];
                foreach ($moduleDir as $value) {
                    File::makeDirectory(base_path('modules/' . $value), 0755, true, true);
                }
                
                Artisan::call('module:make-models', [
                    'name' => strtolower($name),
                    'module' => null
                ]);
                Artisan::call('observers:make', [
                    'name' => strtolower($name),
                    'module' => null
                ]);
                Artisan::call('module:make-controller', [
                    'name' => strtolower($name),
                    'module' => null
                ]);
                Artisan::call('module:make-middleware', [
                    'name' => strtolower($name),
                    'module' => null                    
                ]);
                Artisan::call('module:make-routes', [
                    'name' => strtolower($name),
                ]);
                Artisan::call('module:repositories', [
                    'module' => strtolower($name),
                ]);
                Artisan::call('module:make-policy', [
                    'module' => strtolower($name),
                ]);
                
                $viewPath = base_path("app/Console/Commands/template");
                $sourceView = $viewPath ."/index.blade.php";
                if (File::exists($sourceView)){                    
                    $destView = $pathModule."/Resources/views/index.blade.php";
                    File::copy($sourceView, $destView);

                    $sourceTmpView = $viewPath ."/phoenix/tmp.blade.php"; 
                    $destPhoenixView = $pathModule."/Resources/views/phoenix/".strtolower($name).".blade.php";
                    File::copy($sourceTmpView, $destPhoenixView);

                    $sourceLayoutView =$viewPath."/phoenix/phoenix.blade.php";
                    $destPhoenixLayoutView = $pathModule."/Resources/views/phoenix/phoenix.blade.php";
                    File::copy($sourceLayoutView, $destPhoenixLayoutView);
                    $destPhoenixPartsView = $pathModule."/Resources/views/phoenix/parts/".strtolower($name)."-content.blade.php";
                    File::copy($sourceView, $destPhoenixPartsView);
                    
                }
                $this->info('Module success');
                $this->info('Xem huong dan cau hinh Module');
                $this->info('Vào Trang quản trị: thêm danh sách module, phân quyền cho nhóm người dùng, rồi tạo menu');
                $this->info('Vào web.php của module tạo route ');
                $this->info('Vào controller để cập nhật module ');
                $this->info('Vào views ->parts/ tạo views: module-content.blade.php ');
            }
        }
        
    }
}
