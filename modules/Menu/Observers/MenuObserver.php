<?php
namespace Modules\Menu\Observers;
use Modules\Menu\Models\Menu;
class MenuObserver
{

    public function creating(Menu $data)
    {
        // echo 'creating';
    }
    public function created(Menu $data)
    {
        // echo 'created';
    }
}
