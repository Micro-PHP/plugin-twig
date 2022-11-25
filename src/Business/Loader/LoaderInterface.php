<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Micro\Plugin\Twig\Plugin\TwigExtensionPluginInterface;
use Twig\Environment;
use Twig\Error\Error;

interface LoaderInterface
{
    /**
     * @param Environment $environment
     * @param object $plugin
     *
     * @throws Error
     *
     * @return void
     */
    public function load(Environment $environment, TwigExtensionPluginInterface $plugin): void;

    /**
     * @param object $plugin
     *
     * @return bool
     */
    public function supports(object $plugin): bool;
}
