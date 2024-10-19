<?php
namespace Modules\Entity\Model\Blog;
use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;
use App\Models\User;
use Modules\Entity\Model\File\Model as File;
use Modules\Entity\Observers\NewsObserver;
use Modules\Entity\Model\Translation\Model as Translation;
//use App\Observers\NewsObserver;


class Model extends ModelParent
{
    protected $table = 'articles';
    //protected $with = ['files'];
    protected $fillable = ['name', 'text', 'img', 'file_id', 'description', 'publish'];

    protected $filter_class = Filter::class;
    use Presenter;

   function files()
    {

        return $this->morphOne(File::class, 'fileable');
    }


    function getNameSpace()
    {
        return __NAMESPACE__;
    }

    function relTrans()
    {
        return $this->morphMany(Translation::class, 'transable');

    }
}