<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $table = 'repositories';

    protected $fillable = [
        'actor_id',
        'api_id',
        'name',
        'description',
        'repo_url'
    ];

    public function scopeApiId(Builder $query, int $apiId) : Builder
    {
        return $query->where('api_id', $apiId);
    }

    public static function repoByApiId(int $apiId) : ?Repository
    {
        return self::apiId($apiId)
            ->first();
    }
}
