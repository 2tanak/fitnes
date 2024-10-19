<?php
namespace Modules\Entity\App\Providers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
//use Modules\Entity\Events\News\News;
use Modules\Entity\Events\Editor;
use Modules\Entity\Events\СacheEvent;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
       Editor::class => [
		   'Modules\Entity\Listeners\EditorPhotoSave',
		],
		 СacheEvent::class => [
		   'Modules\Entity\Listeners\CacheListeners',
		],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
	
		 parent::boot();
        //
    }
}
