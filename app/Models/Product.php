<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $table = 'products';
    protected $guarded = false;
    protected $fillable = ['name', 'article', 'status', 'data'];
    protected $casts = [
        'data' => 'array'
    ];

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }
}
