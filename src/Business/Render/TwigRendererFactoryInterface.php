<?php

namespace Micro\Plugin\Twig\Business\Render;

interface TwigRendererFactoryInterface
{
    /**
     * @return TwigRendererInterface
     */
    public function create(): TwigRendererInterface;
}
