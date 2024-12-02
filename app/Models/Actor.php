<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $table = 'actors';

    protected $fillable = [
        'api_id',
        'login',
        'avatar_url'
    ];

    public function scopeApiId(Builder $query, ?int $apiId) : Builder
    {
        return $query->where('api_id', $apiId);
    }

    public function scopeLogin(Builder $query, ?string $login) : Builder
    {
        return $query->where('login', $login);
    }

    public static function actorByApiIdLogin(?int $apiId, ?string $login) : ?Actor
    {
        $actor = self::apiId($apiId)->first();
        if (!$actor) {
            $actor = self::login($login)->first();
        }

        return $actor;
    }
}
