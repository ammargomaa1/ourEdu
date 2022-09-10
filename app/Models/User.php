<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Traits\CanBeFiltered;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use CanBeFiltered;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'id',
        'currency',
        'balance',
        'created_at'
    ];


    public $timestamps = false;
    public $incrementing = false;

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            set: fn($date) => date('Y-m-d', strtotime(str_replace('/', '-', $date)))
        );
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'user_email','email');
    }
}
