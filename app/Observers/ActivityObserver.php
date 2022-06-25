<?php

namespace App\Observers;

use App\Models\Activity;
use Faker\Provider\Uuid;

class ActivityObserver
{

    /**
     * Handle the Activity "creating" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */

    public function creating(Activity $activity): void
    {
        $activity->id = Uuid::uuid();
        $user_id = auth()->user()->id;

        $activity->slug         = str_slug($activity->title);
        $activity->created_by   = $user_id;
        $activity->updated_by   = $user_id;
    }

    /**
     * Handle the Activity "updated" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */

    public function updating(Activity $activity): void
    {
        $activity->slug         = str_slug($activity->title);
        $activity->updated_by   = auth()->user()->id;
    }
}
