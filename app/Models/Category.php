<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Atributos que se pueden rellenar a través de métodos create() y update().
     *
     * @var string[]
     */
    protected $fillable = [
        'title', 'alias', 'position', 'published', 'created_at', 'updated_at', 'created_by', 'updated_by'
    ];
}
