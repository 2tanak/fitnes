<?php

namespace Modules\Admin\App\Http\Controllers\Roles;

use Illuminate\Http\Request;


use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Role\UpdateAction as ModelCreateAction;
use Modules\Entity\Actions\Role\UpdateAction as ModelUpdateAction;
use Modules\Entity\Actions\MainSaveAction as ModelSaveLangAction;
use Modules\Entity\Actions\Role\DeleteAction as ModelDeleteAction;

use Spatie\Permission\Models\Role as Model;


class StartController extends Controller
{
    use MainCrudMethod;
    protected $informers = true;
    protected $view_path = 'admin::page.role';
    protected $route_path = 'role';
    protected $title_path = 'title.roles';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;


   
}