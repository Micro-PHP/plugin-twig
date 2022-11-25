<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Twig\Environment;
use Twig\Error\Error;

interface LoaderProcessorInterface
{
    /**
     * @param Environment $environment
     *
     * @throws Error
     *
     * @return void
     */
    public function load(Environment $environment): void;
}
