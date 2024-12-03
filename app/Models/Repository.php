<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
        'repo_url',
        'created_at'
    ];

    public function scopeApiId(Builder $query, int $apiId) : Builder
    {
        return $query->where('repositories.api_id', $apiId);
    }

    public function scopeGroupId(Builder $query) : Builder
    {
        return $query->groupBy('repositories.id');
    }

    public static function repoByApiId(int $apiId) : ?Repository
    {
        return self::apiId($apiId)
            ->first();
    }

    public static function top10Repos() : Collection
    {
        return self::selectRaw("
                repositories.name,
                count(*) as totalCommits
            ")
            ->join('commits', 'commits.repository_id', '=', 'repositories.id')
            ->groupId()
            ->orderBy('totalCommits', 'DESC')
            ->limit(10)
            ->get();
    } 
}
