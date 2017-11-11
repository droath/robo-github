<?php

namespace Droath\RoboGitHub\Task;

use Github\Client;
use Robo\Task\BaseTask;

/**
 * GitHub base class for Robo tasks.
 */
abstract class GitHubBase extends BaseTask
{
    /**
     * GitHub account.
     *
     * @var string
     */
    protected $account;

    /**
     * GitHub authentication token.
     *
     * @var string
     */
    protected $authToken;

    /**
     * GitHub repository name.
     *
     * @var string
     */
    protected $repository;

    public function __construct($auth_token = null, $account = null, $repository = null)
    {
        $this->account = $account;
        $this->authToken = $auth_token;
        $this->repository = $repository;
    }

    /**
     * Set GitHub account name.
     *
     * @param string $account
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Set GitHub repository name.
     *
     * @param string $repository
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
       if (!isset($this->account) || !isset($this->repository)) {
            throw new \RuntimeException(
                'Missing GitHub account or repository name.'
            );
        }
    }

    /**
     * Has GitHub authentication token.
     *
     * @return bool
     */
    protected function hasAuthToken()
    {
        return isset($this->authToken);
    }

    /**
     * Get GitHub client object.
     *
     * @return \Github\Client
     */
    protected function getClient()
    {
        $client = new Client();

        if ($this->hasAuthToken()) {
             $client->authenticate($this->authToken, null, 'http_token');
        }

        return $client;
    }
}
