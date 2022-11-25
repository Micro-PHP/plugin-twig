<?php

namespace Micro\Plugin\Twig\Plugin;

use Twig\Extension\ExtensionInterface;

interface TwigExtensionPluginInterface
{
    /**
     * @return iterable<ExtensionInterface>
     */
    public function provideTwigExtensions(): iterable;
}
