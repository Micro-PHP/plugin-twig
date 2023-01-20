<?php

/*
 *  This file is part of the Micro framework package.
 *
 *  (c) Stanislau Komar <kost@micro-php.net>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Micro\Plugin\Twig\Business\Render;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

interface TwigRendererInterface
{
    /**
     * @param array<string, mixed> $arguments
     *
     * @throws LoaderError  When the template cannot be found
     * @throws RuntimeError When a previously generated cache is corrupted
     * @throws SyntaxError  When an error occurred during compilation
     */
    public function render(string $template, array $arguments): string;
}
