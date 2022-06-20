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

    /**
     * get user role from current session.
     *
     * @return string
     */

    public function getUserRole(): string
    {
        return $this->fetchUserSession()->role;
    }

    /**
     * Check if current session is village_head
     *
     * @return bool
     */

    public function IsVillageHead(): bool
    {
        return $this->getUserRole() == 'village_head';
    }

    /**
     * Check if current session is administrator
     *
     * @return bool
     */

    public function IsAdmin(): bool
    {
        return $this->getUserRole() == 'administrator';
    }
}
