<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\Due;
use App\Models\Finance;
use App\Models\Residence;
use App\Models\User;
use App\Observers\ActivityObserver;
use App\Observers\DueObserver;
use App\Observers\FinanceObserver;
use App\Observers\ResidenceObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Residence::observe(ResidenceObserver::class);
        Activity::observe(ActivityObserver::class);
        Due::observe(DueObserver::class);
        Finance::observe(FinanceObserver::class);
    }
}
