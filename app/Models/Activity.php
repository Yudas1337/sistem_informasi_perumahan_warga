<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'title', 'description', 'thumbnail', 'content', 'location', 'date', 'slug', 'categories_id', 'created_by', 'updated_by'];

    public $keyType = 'char';
    public $incrementing = false;

    /**
     * One to Many Relationship with ActivityCategory models.
     *
     * @return relationship
     */

    public function category()
    {
        return $this->belongsTo(ActivityCategory::class, 'categories_id');
    }

    /**
     * One to Many Relationship with User models.
     *
     * @return relationship
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
