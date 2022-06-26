<?php

namespace App\Observers;

use App\Models\Due;
use Faker\Provider\Uuid;

class DueObserver
{
    /**
     * Handle the Due "creating" event.
     *
     * @param  \App\Models\Due  $due
     * @return void
     */

    public function creating(Due $due): void
    {
        $due->id = Uuid::uuid();
    }
}
