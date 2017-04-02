<?php

namespace Droath\RoboGitHub\Task\Issue;

use Droath\RoboGitHub\RequestParametersTrait;

/**
 * Define GitHub issue list.
 */
class IssueList extends IssueBase
{
   use RequestParametersTrait;

    /**
     * Indicates which sorts of issues to return.
     *
     * @param string $filter
     * The filter parameter can be any of the following:
     *   - assigned: Issues assigned to you
     *   - created: Issues created by you
     *   - mentioned: Issues mentioning you
     *   - subscribed: Issues you're subscribed to updates for
     *   - all: All issues the authenticated user can see, regardless of
     *   participation or creation
     *
     * @return self
     */
    public function filter($filter = 'assigned')
    {
        $this->setParameter('filter', $filter);

        return $this;
    }

    /**
     * Indicates the state of the issues to return.
     *
     * @param string $state
     *   The issue state can be the following: open, closed, or all.
     *
     * @return self
     */
    public function state($state = 'open')
    {
        $this->setParameter('state', $state);

        return $this;
    }

    /**
     * A list of comma separated label names.
     *
     * @param array $labels
     *   An array of GitHub labels.
     *
     * @return self
     */
    public function labels(array $labels)
    {
        $this->setParameter('labels', explode(',', $labels));

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        parent::run();

        return $this
            ->getInstance()
            ->all($this->account, $this->repository, $this->parameters);
    }
}
