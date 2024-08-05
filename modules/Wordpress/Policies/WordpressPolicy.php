<?php 

namespace Modules\Wordpress\Policies;
use App\Models\User;
use Modules\Wordpress\Models\Wordpress;


use Illuminate\Auth\Access\HandlesAuthorization;

class WordpressPolicy
{
    use HandlesAuthorization;
 
    public function view(User $user)
    {
         // true: là cho phép
        $check = checkPermissions($user,"Wordpress","view");        
        return $check;
    }
    
    public function create(User $user)
    {
        // true: là cho phép
        $check = checkPermissions($user,"Wordpress","create");        
        return $check;
    }

    public function update(User $user)
    {
        // true: là cho phép 
        $check = checkPermissions($user,"Wordpress","update");        
        return $check;
    }

    public function delete(User $user)
    {
        // true: là cho phép
        $check = checkPermissions($user,"Wordpress","delete");        
        return $check;
    }    
}
