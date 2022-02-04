<?php

namespace Micro\Plugin\Twig;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

interface TwigFacadeInterface
{
    /**
     * @param string $templateName
     * @param array $arguments
     *
     * @return string
     *@throws RuntimeError
     * @throws SyntaxError
     *
     * @throws LoaderError
     */
    public function render(string $templateName, array $arguments = []): string;
}
