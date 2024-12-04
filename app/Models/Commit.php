<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    use HasFactory;

    protected $table = 'commits';

    protected $fillable = [
        'repository_id',
        'branch_id',
        'actor_id',
        'sha',
        'message',
        'created_at'
    ];

    public function scopeSha(Builder $query, string $sha) : Builder
    {
        return $query->where('sha', $sha);
    }

    public static function commitBySha(string $sha) : ?Commit
    {
        return self::sha($sha)
            ->first();
    }
}
