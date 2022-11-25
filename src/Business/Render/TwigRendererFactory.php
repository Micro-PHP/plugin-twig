<?php

namespace Micro\Plugin\Twig\Business\Render;

use Micro\Plugin\Twig\Business\Environment\EnvironmentFactoryInterface;

class TwigRendererFactory implements TwigRendererFactoryInterface
{
    /**
     * @param EnvironmentFactoryInterface $environmentFactory
     */
    public function __construct(private EnvironmentFactoryInterface $environmentFactory)
    {
    }

    /**
     * @return TwigRendererInterface
     */
    public function create(): TwigRendererInterface
    {
        return new TwigRenderer($this->environmentFactory);
    }
}
