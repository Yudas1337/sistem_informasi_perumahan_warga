<?php

namespace App\Traits;

trait SearchTrait
{
    /**
     * Scope a query to search with where
     *
     * @param mixed $query
     * @param mixed $column
     * @param mixed $value
     * 
     * @return object
     */

    public function scopeWhereLike($query, $column, $value)
    {
        return $query->where($column, 'like', '%' . $value . '%');
    }

    /**
     * Scope a query to search with orWhere
     *
     * @param mixed $query
     * @param mixed $column
     * @param mixed $value
     * 
     * @return object
     */

    public function scopeOrWhereLike($query, $column, $value)
    {
        return $query->orWhere($column, 'like', '%' . $value . '%');
    }
}
