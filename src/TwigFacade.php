<?php

namespace Micro\Plugin\Twig;

use Micro\Plugin\Twig\Business\Render\TwigRendererFactoryInterface;

class TwigFacade implements TwigFacadeInterface
{
    /**
     * @param TwigRendererFactoryInterface $twigRendererFactory
     */
    public function __construct(private TwigRendererFactoryInterface $twigRendererFactory)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function render(string $templateName, array $arguments = []): string
    {
        return $this->twigRendererFactory
            ->create()
            ->render($templateName, $arguments);
    }
}
