<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    use HasFactory, SearchTrait;

    protected $table = 'residences';

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
        'neighbourhood',
        'hamlet',
        'address',
        'images',
        'house_types_id'
    ];


    /**
     * One to Many Relationship with HouseType models.
     *
     * @return relationship
     */

    public function house_type()
    {
        return $this->belongsTo(HouseType::class, 'house_types_id');
    }
}
