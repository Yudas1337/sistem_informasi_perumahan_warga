<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Due extends Model
{
    use HasFactory;

    protected $table = 'dues';

    protected $primaryKey = 'id';
    protected $keyType = 'char';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'description',
        'date',
        'total',
        'residences_id',
    ];

    /**
     * One to Many Relationship with Residence models.
     *
     * @return relationship
     */

    public function residence()
    {
        return $this->belongsTo(Residence::class, 'residences_id');
    }
}
