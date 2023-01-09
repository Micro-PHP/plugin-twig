<?php

namespace Micro\Plugin\Twig;

use Micro\Plugin\Twig\Business\Render\TwigRendererFactoryInterface;

class TwigFacade implements TwigFacadeInterface
{
    public function __construct(private readonly TwigRendererFactoryInterface $twigRendererFactory)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function render(string $template, array $arguments = []): string
    {
        return $this->twigRendererFactory
            ->create()
            ->render($template, $arguments);
    }
}
