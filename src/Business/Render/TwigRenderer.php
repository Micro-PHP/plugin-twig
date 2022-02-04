<?php

namespace Micro\Plugin\Twig\Business\Render;

use Micro\Plugin\Twig\Business\Environment\EnvironmentFactoryInterface;

class TwigRenderer implements TwigRendererInterface
{
    /**
     * @param EnvironmentFactoryInterface $environmentFactory
     */
    public function __construct(
    private EnvironmentFactoryInterface $environmentFactory
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function render(string $template, array $arguments): string
    {
        return $this->environmentFactory
            ->create()
            ->load($template)
            ->render($arguments);
    }
}
