<?php

namespace Modules\Entity\Listeners;
use App\Models\User;
use Modules\Entity\Events\News\News;
class NewsListener
{
    

    public function __construct()
    {
        
    }

    public function handle($event)
    {
		
	   if ($event instanceof News){
		   return true;
		     //$this->registered($event);
		}
		
		
		//$requisition = $event->requisition;
	         //$event->news->attachBadgeFor(User::all());

	 
     /*
	if ($event instanceof Registered) {
            $this->registered($event);
        } 
		
		
		elseif ($event instanceof ConfirmedByOwner) {
            $this->confirmedByOwner($event);
        } elseif ($event instanceof ConfirmedByCurator) {
            $this->confirmedByCurator($event);
        } elseif ($event instanceof ConfirmedByAdmin) {
            $this->confirmedByAdmin($event);
        }
		*/
    }
 public function registered(Registered $event)
    {

        //$requisition = $event->news;
        //dd($requisition);
        //$requisition->attachBadgeFor(User::all());
        $filename = 'datatest.json';
        $data[] = 1;
        $fp = fopen($filename, 'a');
        fwrite($fp, json_encode($data));
        fclose($fp);
    }
    /**
     * New requisition created
     *
     * @param Registered $event
     */

   

  
    
}