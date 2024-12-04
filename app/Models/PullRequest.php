<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PullRequest extends Model
{
    use HasFactory;

    protected $table = 'pull_requests';

    protected $fillble = [
        'repository_id',
        'actor_id',
        'api_id',
        'title',
        'created_at'
    ];

    public function scopeApiId(Builder $query, int $apiId) : Builder
    {
        return self::where('api_id', $apiId);
    }

    public static function pullRequestByApiId(int $apiId) : ?PullRequest
    {
        return self::apiId($apiId)
            ->first();
    }
}
