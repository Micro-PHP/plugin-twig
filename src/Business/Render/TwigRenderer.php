<?php

namespace Micro\Plugin\Twig\Business\Render;

use Micro\Plugin\Twig\Business\Environment\EnvironmentFactoryInterface;

class TwigRenderer implements TwigRendererInterface
{
    public function __construct(
        private readonly EnvironmentFactoryInterface $environmentFactory
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public function render(string $template, array $arguments): string
    {
        return $this->environmentFactory
            ->create()
            ->load($template)
            ->render($arguments);
    }
}
