<?php

namespace App\Observers;

use App\Models\Finance;
use Faker\Provider\Uuid;

class FinanceObserver
{
    /**
     * Handle the Finance "creating" event.
     *
     * @param  \App\Models\Finance  $finance
     * @return void
     */

    public function creating(Finance $finance): void
    {
        $finance->id = Uuid::uuid();
    }
}
