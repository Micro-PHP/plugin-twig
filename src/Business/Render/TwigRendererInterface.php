<?php

namespace Micro\Plugin\Twig\Business\Render;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

interface TwigRendererInterface
{
    /**
     * @param string $template
     * @param array $arguments
     *
     * @throws LoaderError  When the template cannot be found
     * @throws RuntimeError When a previously generated cache is corrupted
     * @throws SyntaxError  When an error occurred during compilation
     *
     * @return string
     */
    public function render(string $template, array $arguments): string;
}
