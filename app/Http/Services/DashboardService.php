<?php

namespace App\Http\Services;

use App\Models\Actor;
use App\Models\Commit;
use App\Models\Issue;
use App\Models\Repository;

class DashboardService
{
    public function count(string $type) : int
    {
        switch ($type) {
            case 'repositories':
                return Repository::count();
            
            case 'commits':
                return Commit::count();

            case 'issues':
                return Issue::count();

            default:
                return Actor::count();
        }
    }

}