<?php

namespace App\Traits;

use Illuminate\Contracts\Auth\Authenticatable;

trait UserTrait
{
    /**
     * get current session from login.
     *
     * @return Illuminate\Contracts\Auth\Authenticatable|null
     */

    public function fetchUserSession(): Authenticatable|null
    {
        return auth()->user();
    }

    /**
     * get user id from current session.
     *
     * @return string
     */

    public function getUserId(): string
    {
        return $this->fetchUserSession()->id;
    }
}
