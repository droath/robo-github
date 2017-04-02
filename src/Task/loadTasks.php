<?php

namespace Droath\RoboGitHub\Task;

use Droath\RoboGitHub\Task\Issue\IssueAssignees;
use Droath\RoboGitHub\Task\Issue\IssueList;

/**
 * Load GitHub Robo tasks.
 */
trait loadTasks
{
    /**
     * GitHub issue list task.
     */
    protected function taskGitHubIssueList($auth_token = null, $account = null, $repository = null)
    {
        return $this->task(IssueList::class, $auth_token, $account, $repository);
    }

    /**
     * GitHub issue assignees task.
     */
    protected function taskGitHubIssueAssignees($auth_token = null, $account = null, $repository = null)
    {
        return $this->task(IssueAssignees::class, $auth_token, $account, $repository);
    }
}
