<?php

namespace Micro\Plugin\Twig\Business\Environment;

use Twig\Environment;

interface EnvironmentFactoryInterface
{
    public function create(): Environment;
}
