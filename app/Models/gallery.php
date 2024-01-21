<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'type', 'image', 'video_link', 'video_type'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
