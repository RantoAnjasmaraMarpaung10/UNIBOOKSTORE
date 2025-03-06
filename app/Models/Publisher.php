<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publisher extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'name', 'address', 'city', 'phone'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($publisher) {
            $publisher->id = 'PB' . strtoupper(Str::substr(Str::uuid(), 0, 6));
        });
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
