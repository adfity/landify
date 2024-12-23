<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Template extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'title', 'short_description', 'content', 'views', 
        'price', 'type', 'sort_preference', 'status', 'img1', 'img2', 'img3', 'user_id'
    ];

    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Buat ID unik dengan panjang 6 karakter alfanumerik
            $model->{$model->getKeyName()} = self::generateUniqueId();
        });
    }

    /**
     * Generate ID unik dengan panjang 6 karakter.
     *
     * @return string
     */
    protected static function generateUniqueId()
    {
        do {
            $id = Str::lower(Str::random(6)); // Huruf kecil dan angka
        } while (self::where('id', $id)->exists()); // Pastikan ID unik

        return $id;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Relasi ke User
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans(); // Format updated_at
    }
}
