<?php
namespace Modules\Thuoc\Observers;
use Modules\Thuoc\Models\Thuoc;
class ThuocObserver
{

    public function creating(Thuoc $data)
    {
        // echo 'creating';
    }
    public function created(Thuoc $data)
    {
        // echo 'created';
    }
}
