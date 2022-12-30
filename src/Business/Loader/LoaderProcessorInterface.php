<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Twig\Environment;
use Twig\Error\Error as TwigError;

interface LoaderProcessorInterface
{
    /**
     * @throws TwigError
     */
    public function load(Environment $environment): void;
}
