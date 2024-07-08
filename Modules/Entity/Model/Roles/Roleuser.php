<?php
namespace Modules\Entity\Model\Roles;
use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;
use App\Models\User;





class Roleuser extends ModelParent {
    protected $table = 'role_user';
	
	protected $fillable = ['user_id','role_id'];
	
	protected $filter_class = Filter::class; 
    
}
