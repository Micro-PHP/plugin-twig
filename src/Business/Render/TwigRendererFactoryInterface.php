<?php

namespace Micro\Plugin\Twig\Business\Render;

interface TwigRendererFactoryInterface
{
    public function create(): TwigRendererInterface;
}
