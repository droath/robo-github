<?php

namespace Droath\RoboGitHub\Task\Issue;

use Droath\RoboGitHub\Task\GitHubBase;
use Github\Api\Issue;

/**
 * Define GitHub base.
 */
abstract class IssueBase extends GitHubBase
{
    /**
     * Get GitHub issue instance.
     *
     * @return \Github\Api\Issue
     */
    protected function getInstance()
    {
        return new Issue($this->getClient());
    }
}
