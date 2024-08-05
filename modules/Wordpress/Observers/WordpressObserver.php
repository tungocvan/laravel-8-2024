<?php
namespace Modules\Wordpress\Observers;
use Modules\Wordpress\Models\Wordpress;
class WordpressObserver
{

    public function creating(Wordpress $data)
    {
        // echo 'creating';
    }
    public function created(Wordpress $data)
    {
        // echo 'created';
    }
}
