<?php 

namespace Modules\Thuoc\Policies;
use App\Models\User;
use Modules\Thuoc\Models\Thuoc;


use Illuminate\Auth\Access\HandlesAuthorization;

class ThuocPolicy
{
    use HandlesAuthorization;
 
    public function view(User $user)
    {
         // true: là cho phép
        $check = checkPermissions($user,"Thuoc","view");        
        return $check;
    }
    
    public function create(User $user)
    {
        // true: là cho phép
        $check = checkPermissions($user,"Thuoc","create");        
        return $check;
    }

    public function update(User $user)
    {
        // true: là cho phép 
        $check = checkPermissions($user,"Thuoc","update");        
        return $check;
    }

    public function delete(User $user)
    {
        // true: là cho phép
        $check = checkPermissions($user,"Thuoc","delete");        
        return $check;
    }    
}
