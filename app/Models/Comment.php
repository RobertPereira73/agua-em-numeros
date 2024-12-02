<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'repository_id',
        'actor_id',
        'issue_id',
        'pull_request_id',
        'api_id',
        'comment'
    ];

    public function scopeApiId(Builder $query, int $apiId) : Builder
    {
        return self::where('api_id', $apiId);
    }

    public static function commentByApiId(int $apiId) : ?Comment
    {
        return self::apiId($apiId)
            ->first();
    }
}
