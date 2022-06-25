<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denizen extends Model
{
    use HasFactory;

    protected $table = 'denizens';

    protected $primaryKey = 'nik';
    protected $keyType = 'char';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'nik',
        'name',
        'phone_number',
        'birth_place',
        'birth_date',
        'photo',
        'gender',
        'families',
        'religion',
        'residences_id'
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
