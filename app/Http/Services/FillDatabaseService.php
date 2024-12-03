<?php

namespace App\Http\Services;

use App\Models\Actor;
use App\Models\Branch;
use App\Models\Comment;
use App\Models\Commit;
use App\Models\Events;
use App\Models\Issue;
use App\Models\PullRequest;
use App\Models\Repository;
use Illuminate\Support\Facades\DB;

class FillDatabaseService
{
    public function fill(array $data)
    {
        DB::beginTransaction();

        $actor = $this->searchActor($data['actor']);
        $repository = $this->searchRepo($data['repo'], $actor->id);
        $this->searchEvent($data, $actor->id, $repository->id);

        $payload = $data['payload'];
        
        $commits = $payload['commits'] ?? [];
        if (count($commits)) {
            $branch = $this->searchBranch($payload, $repository->id);
            foreach ($commits as $commit) {
                $this->searchCommit($commit, $actor->id, $repository->id, $branch->id);
            }
        }

        $pullRequest = $payload['pull_request'] ?? [];
        if (count($pullRequest)) {
            $user = $this->searchActor($pullRequest['user']);
            $pullRequest = $this->searchPullRequest($pullRequest, $repository->id, $user->id);
        }

        $issue = $payload['issue'] ?? [];
        if (count($issue)) {
            $user = $this->searchActor($issue['user']);
            $issue = $this->searchIssue($issue, $repository->id, $user->id);
        }

        $comment = $payload['comment'] ?? [];
        if (count($comment)) {
            $user = $this->searchActor($comment['user']);
            $comment = $this->searchComment($comment, $repository->id, $user->id, $issue->id ?? null, $pullRequest?->id ?? null);
        }

        DB::commit();
    }

    public function searchActor(array $data) 
    {
        $actor = Actor::actorByApiIdLogin($data['id'], $data['login']);
        if (!$actor) {
            $actor = Actor::create([
                'api_id' => $data['id'],
                'login' => $data['login'],
                'avatar_url' => $data['avatar_url']
            ]);
        }

        return $actor;
    }

    public function searchRepo(array $data, ?int $actorId=null, )
    {
        $repo = Repository::repoByApiId($data['id']);
        if (!$repo) {
            $collect = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
            $month = $collect->random();
            $createdAt = "2015-{$month}-01";

            $repo = Repository::create([
                'actor_id' => $actorId,
                'api_id' => $data['id'],
                'name' => $data['name'],
                'repo_url' => $data['url'],
                'created_at' => $createdAt
            ]);
        }

        return $repo;
    }

    public function searchBranch(array $data, int $repositoryId=null)
    {
        $branch = Branch::brancByRepoName($repositoryId, $data['ref']);
        if (!$branch) {
            $branch = Branch::create([
                'repository_id' => $repositoryId,
                'name' => $data['ref']
            ]);
        }

        return $branch;
    } 

    public function searchIssue(array $data, int $repositoryId, int $actorId)
    {
        $issue = Issue::issueByApiId($data['id']);
        if (!$issue) {
            $issue = Issue::create([
                'repository_id' => $repositoryId,
                'actor_id' => $actorId,
                'title' => $data['title'],
                'api_id' => $data['id'],
                'status' => $data['state']
            ]);
        } else {
            $issue->status = $data['state'];
            $issue->save();
        }

        return $issue;
    }

    public function searchCommit(array $data, int $actorId, int $repositoryId, int $branchId)
    {
        $commit = Commit::commitBySha($data['sha']);
        if (!$commit) {
            $commit = Commit::create([
                'repository_id' => $repositoryId,
                'branch_id' => $branchId,
                'actor_id' => $actorId,
                'sha' => $data['sha'],
                'message' => $data['message']
            ]);
        }

        return $commit;
    }

    public function searchComment(array $data, int $repositoryId, int $actorId, ?int $issueId=null, ?int $pullRequestId=null)
    {
        $comment = Comment::commentByApiId($data['id']);
        if (!$comment) {
            $comment = Comment::create([
                'repository_id' => $repositoryId,
                'actor_id' => $actorId,
                'issue_id' => $issueId,
                'pull_request_id' => $pullRequestId,
                'api_id' => $data['id'],
                'comment' => $data['body']
            ]);
        }

        return $comment;
    }

    public function searchPullRequest(array $data, int $repositoryId, int $actorId) 
    {
        $pullRequest = PullRequest::pullRequestByApiId($data['id']);
        if (!$pullRequest) {
            $pullRequest = PullRequest::create([
                'repository_id' => $repositoryId,
                'actor_id' => $actorId,
                'api_id' => $data['id'],
                'title' => $data['title']
            ]);
        }

        return $pullRequest;
    }

    public function searchEvent(array $data, int $actorId, int $repositoryId)
    {
        $event = Events::eventByApiId($data['id']);
        if (!$event) {
            $event = Events::create([
                'api_id' => $data['id'],
                'type' => $data['type'],
                'actor_id' => $actorId,
                'repository_id' => $repositoryId,
            ]);
        }

        return $event;
    }
}