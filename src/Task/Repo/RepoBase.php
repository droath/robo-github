<?php

namespace Droath\RoboGitHub\Task\Repo;

use Droath\RoboGitHub\Task\GitHubBase;
use Github\Api\Repo;

/**
 * Define GitHub repository base.
 */
abstract class RepoBase extends GitHubBase
{
    /**
     * Get GitHub repository instance.
     */
    protected function getInstance()
    {
        return new Repo($this->getClient());
    }
}
