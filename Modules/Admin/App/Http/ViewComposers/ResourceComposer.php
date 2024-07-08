<?php

namespace Modules\Admin\App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ResourceComposer
{
    public function compose(View $view)
    {
       
dd(150);
        $view->with([
            'is_admin_section'  => $isAdminSection,
            'menus'             => $menus,
            'user'              => $user,
            'options'           => [],
            'subscription'      => $subscription,
        ]);
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}