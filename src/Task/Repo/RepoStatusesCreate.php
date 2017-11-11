<?php

namespace Droath\RoboGitHub\Task\Repo;

use Droath\RoboGitHub\Task\Repo\RepoBase;

/**
 * Define GitHub repository statues create.
 */
class RepoStatusesCreate extends RepoBase
{
    /**
     * The repository statuses sha reference.
     *
     * @var string
     */
    protected $sha;

    /**
     * The repository statuses parameters.
     *
     * @var array
     */
    protected $parameters = array();

    /**
     * Set repository statues sha.
     *
     * @param string $sha
     *   The repository sha reference.
     */
    public function setSha($sha)
    {
        $this->sha = $sha;

        return $this;
    }

    /**
     * Set repository statues state.
     *
     * @param string $state
     *   The state of the status.
     */
    public function setParamState($state)
    {
        $this->parameters['state'] = $state;

        return $this;
    }

    /**
     * Set repository statues description.
     *
     * @param string $description
     *   A short description of the status.
     */
    public function setParamDescription($description)
    {
        $this->parameters['description'] = $description;

        return $this;
    }

    /**
     * Set repository statues target url.
     *
     * @param string $target_url
     *   The target URL to associate with this status.
     */
    public function setParamTargetUrl($target_url)
    {
        $this->parameters['target_url'] = $target_url;

        return $this;
    }

    /**
     * Set repository statues context.
     *
     * @param string $context
     *   A string label to differentiate this status from the status of other
     *   systems.
     */
    public function setParamContext($context)
    {
        $this->parameters['context'] = $context;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        parent::run();

        if (!isset($this->sha)) {
            throw new \RuntimeException(
                'GitHub repository sha reference is required.'
            );
        }

        return $this->getInstance()
            ->create($this->account, $this->repository, $this->sha, $this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    protected function getInstance()
    {
        return parent::getInstance()->statuses();
    }
}
