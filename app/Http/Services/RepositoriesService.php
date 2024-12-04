<?php

namespace App\Http\Services;

use App\Helpers\ValidateException;
use App\Models\Repository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class RepositoriesService
{
    public function repositories(array $values) : LengthAwarePaginator
    {
        $search = $values['search'] ?? null;
        return Repository::repositoriesBySearchPaginated($search);
    }

    public function store(array $values) : Repository
    {   
        return Repository::updateOrCreate(
            ['id' => $values['id'] ?? null],
            [
                'actor_id' => $values['actor_id'],
                'name' => $values['name'] ?? '',
                'description' => $values['description'] ?? null,
                'repo_url' => $values['repo_url'] ?? null
            ]
        );
    }

    public function delete(int $id) : bool
    {
        return Repository::where('id', $id)
            ->delete();
    }
}