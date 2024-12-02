<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $table = 'issues';

    protected $fillable = [
        'repository_id',
        'actor_id',
        'api_id',
        'title',
        'status'
    ];

    public function scopeApiId(Builder $query, int $apiId) : Builder
    {
        return $query->where('api_id', $apiId);
    }

    public static function issueByApiId(int $apiId) : ?Issue
    {
        return self::apiId($apiId)
            ->first();
    }
}
