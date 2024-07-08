<?php

namespace Modules\Admin\Traits;

use Illuminate\Http\Request;
use Modules\Entity\Model\Uslugi\Model as Uslugi;
use Modules\Entity\Model\Otzyv\Model as Otzyv;
use Modules\Entity\Model\Portfolio\Model as Portfolio;
use Modules\Entity\Model\Blog\Model as Blog;
use Modules\Entity\Model\Instrukcii\Model as Instrukcii;
use Modules\Entity\Model\Vakansiya\Model as Vakansiya;
use Modules\Entity\Model\Comanda\Model as Comanda;
use Modules\Entity\Model\Slider2\Model as Slider2;
use Modules\Entity\Model\Konstrukciya\Model as Konstrukciya;
use Modules\Entity\Model\Option\Model as Option;
use Modules\Entity\Model\Region\Model as Region;
use Modules\Entity\Model\Contacts\Model as Contacts;
use Modules\Entity\Model\Price\Model as Price;
use Modules\Entity\Model\Statistics\Model as Statistics;
use Modules\Entity\Model\Portfolio\Category\Model as CategoryPortfolio;
use App\Models\User;
use App\Models\Period;
//use App\Models\Option;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

trait MainListMethod
{
	
	
	
	public function index(Request $request)
	{
		
	    $items = $this->def_model::filter($request)->latest()->paginate(20);
		
		$title = trans($this->title_path . '.index');
		return view($this->view_path . '.index', [
			'title' => $title,
			'items' => $items
		]);
	}
	

	
	
	
	
}
