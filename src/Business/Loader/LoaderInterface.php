<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Twig\Environment;
use Twig\Error\Error as TwigError;

interface LoaderInterface
{
    /**
     * @throws TwigError
     * @throws \InvalidArgumentException
     */
    public function load(Environment $environment, object $plugin): void;

    public function supports(object $plugin): bool;
}
