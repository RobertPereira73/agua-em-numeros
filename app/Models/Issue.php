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
        'status',
        'created_at'
    ];

    public function scopeApiId(Builder $query, int $apiId) : Builder
    {
        return $query->where('api_id', $apiId);
    }

    public function scopeStatus(Builder $query, string $status) : Builder
    {
        return $query->where('status', $status);
    }

    public function scopeGroupStatus(Builder $query) : Builder
    {
        return $query->groupBy('status');
    }

    public static function issueByApiId(int $apiId) : ?Issue
    {
        return self::apiId($apiId)
            ->first();
    }

    public static function totalIssueByStatus($status='closed') : int
    {
        return self::status($status)
            ->groupStatus()
            ->count();
    }
}
