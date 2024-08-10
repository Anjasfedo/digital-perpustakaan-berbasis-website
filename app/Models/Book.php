<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'quantity',
        'file',
        'cover',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function generateStorageUrl($file)
    {
        return $file ? asset(Storage::url($file)) : null;
    }

    public function getFileUrlAttribute()
    {
        return $this->generateStorageUrl($this->file);
    }

    public function getCoverUrlAttribute()
    {
        return $this->generateStorageUrl($this->cover);
    }

    public function getDescriptionPreviewAttribute()
    {
        return substr($this->description, 0, 25) . '...';
    }
}