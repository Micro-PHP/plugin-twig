<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Micro\Framework\Kernel\Plugin\ApplicationPluginInterface;
use Micro\Plugin\Twig\Plugin\TwigTemplatePluginInterface;
use Twig\Environment;
use Twig\Error\Error;

interface LoaderInterface
{
    /**
     * @param Environment $environment
     * @param mixed $plugin
     *
     * @throws Error
     *
     * @return void
     */
    public function load(Environment $environment, $plugin): void;

    /**
     * @param ApplicationPluginInterface $plugin
     *
     * @return bool
     */
    public function supports(ApplicationPluginInterface $plugin): bool;
}
