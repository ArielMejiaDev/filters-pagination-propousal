<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameInUppercaseAttribute() : string
    {
        return Str::upper($this->attributes['name']);
    }

    public function scopeTopTen(Builder $query)
    {
        return $query->where('id', '<=', 10);
    }

    public function scopeFromYesterday(Builder $query): Builder
    {
        return $query->whereDate('created_at', Carbon::yesterday()->toDateString());
    }

    public function scopeNameOfYesterday(Builder $query, string $name): Builder
    {
        return $query->where('name', 'LIKE', "%{$name}%")
            ->whereDate('created_at', Carbon::yesterday()->toDateString());
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
