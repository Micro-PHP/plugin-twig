<?php

namespace Micro\Plugin\Twig\Business\Environment;

use Twig\Environment;

interface EnvironmentFactoryInterface
{
    /**
     * @return Environment
     */
    public function create(): Environment;
}
