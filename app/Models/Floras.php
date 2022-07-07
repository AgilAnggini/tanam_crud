<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floras extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'type_id',
    ];

    public function type()
    {
        return $this->hasOne(Type::class, "id", "type_id");
    }
}
