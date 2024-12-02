<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'api_id',
        'repository_id',
        'actor_id',
        'type'
    ];

    public function scopeApiId(Builder $query, int $apiId) : Builder
    {
        return self::where('api_id', $apiId);
    }

    public static function eventByApiId(int $apiId) : ?Events
    {
        return self::apiId($apiId)
            ->first();
    }
}
