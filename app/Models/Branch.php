<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [
        'repository_id',
        'name',
        'created_at'
    ];

    public function scopeRepositoryId(Builder $query, int $repositoryId) : Builder
    {
        return $query->where('repository_id', $repositoryId);
    }

    public function scopeName(Builder $query, string $name) : Builder
    {
        return $query->where('name', $name);
    } 

    public static function brancByRepoName(int $repositoryId, string $name) : ?Branch
    {
        return self::repositoryId($repositoryId)
            ->name($name)
            ->first();
    }
}
