<?php

namespace Droath\RoboGitHub;

/**
 * Define the HTTP request parameters trait.
 */
trait RequestParametersTrait
{
    /**
     * HTTP request parameters.
     *
     * @var array
     */
    protected $parameters = [];

    /**
     * Set HTTP request parameters.
     *
     * @param string $name
     *   Parameter name.
     * @param string $value
     *   Parameter value.
     */
    protected function setParameter($name, $value)
    {
        if (isset($this->parameters[$name])) {
            throw new Exeception(
                'Parameter has already been defined.'
            );
        }

        $this->parameters[$name] = $value;
    }
}
