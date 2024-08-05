<?php
namespace Modules\Help\Observers;
use Modules\Help\Models\Help;
class HelpObserver
{

    public function creating(Help $data)
    {
        // echo 'creating';
    }
    public function created(Help $data)
    {
        // echo 'created';
    }
}
