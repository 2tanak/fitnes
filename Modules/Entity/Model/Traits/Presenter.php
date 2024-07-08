<?php 
namespace Modules\Entity\Model\Traits;
use Spatie\Permission\Models\Permission;
trait Presenter {

    function getPermissionAr(){
        return Permission::pluck('slug', 'id')->toArray();
    }
    
    
}

