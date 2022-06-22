<?php

namespace App\Observers;

use App\Models\Residence;
use Faker\Provider\Uuid;

class ResidenceObserver
{
    /**
     * Handle the Residence "creating" event.
     *
     * @param  \App\Models\Residence  $residence
     * @return void
     */

    public function creating(Residence $residence): void
    {
        $residence->id = Uuid::uuid();
    }
}
