<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table = 'shortened';
    protected $fillable = [
        'original_link',
        'shortened_link',
        'created_at',
        'updated_at',
        'last_used'
    ];
}
