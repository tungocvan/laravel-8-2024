<?php 

namespace Modules\Help\Policies;
use App\Models\User;
use Modules\Help\Models\Help;


use Illuminate\Auth\Access\HandlesAuthorization;

class HelpPolicy
{
    use HandlesAuthorization;
 
    public function view(User $user)
    {
         // true: là cho phép
        $check = checkPermissions($user,"Help","view");        
        return $check;
    }
    
    public function create(User $user)
    {
        // true: là cho phép
        $check = checkPermissions($user,"Help","create");        
        return $check;
    }

    public function update(User $user)
    {
        // true: là cho phép 
        $check = checkPermissions($user,"Help","update");        
        return $check;
    }

    public function delete(User $user)
    {
        // true: là cho phép
        $check = checkPermissions($user,"Help","delete");        
        return $check;
    }    
}
