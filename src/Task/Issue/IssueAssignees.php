<?php

namespace Droath\RoboGitHub\Task\Issue;

use Droath\RoboGitHub\RequestParametersTrait;

/**
 * Define GitHub issue assignees.
 */
class IssueAssignees extends IssueBase
{
    use RequestParametersTrait;

    /**
     * GitHub issue number.
     *
     * @var int
     */
    protected $number;

    /**
     * Set GitHub issue number.
     *
     * @param int $number
     *
     * @return self
     */
    public function number($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Add assignee to GitHub issue.
     *
     * @param string $assignee
     *   The assignee username.
     */
    public function addAssignee($assignee)
    {
        $this->addAssignees([$assignee]);

        return $this;
    }

    /**
     * Add assignees to GitHub issue.
     *
     * @param string $assignees
     *   An array of GitHub user names.
     */
    public function addAssignees(array $assignees)
    {
        $this->setParameter('assignees', $assignees);

        return $this;
    }

    public function run()
    {
        parent::run();

        return $this
            ->getInstance()
            ->assignees()
            ->add($this->account, $this->repository, $this->number, $this->parameters);
    }
}
