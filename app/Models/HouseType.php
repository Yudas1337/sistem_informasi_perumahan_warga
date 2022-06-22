<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseType extends Model
{
    use HasFactory;
    protected $table = 'house_types';
    protected $primaryKey = 'id';
    protected $fillable = ['type'];

    public $incrementing = false;
    public $keyType = 'char';
}
