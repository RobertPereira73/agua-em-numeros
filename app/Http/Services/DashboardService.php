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

    public function lineChart()
    {
        return Repository::selectRaw("
                month(repositories.created_at) as monthCreated,
	            count(*) AS totalMonth
            ")
            ->groupBy('monthCreated')
            ->orderBy('monthCreated')
            ->pluck('totalMonth');
    }

    public function pieChart() : array
    {
        return [
            [
                'value' => Issue::totalIssueByStatus(),
                'name' => 'Resolvidos'
            ],
            [
                'value' => Issue::totalIssueByStatus('open'),
                'name' => 'Abertos'
            ]
        ];
    }

    public function barChart() : array
    {
        $repositories = Repository::top10Repos();

        $data = [];
        foreach ($repositories as $index => $repository) {
            $data[$index]['Repositório'] = $repository->name;
            $data[$index]['Total commits'] = $repository->totalCommits;
        }

        return $data;
    }
}