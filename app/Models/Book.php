<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id','category', 'title', 'price', 'stock', 'publisher_id'];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($book) {
            $book->id = 'BK' . strtoupper(Str::substr(Str::uuid(), 0, 6));
        });
    }


    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
