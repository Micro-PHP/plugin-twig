<?php

namespace Micro\Plugin\Twig\Plugin;

interface TwigTemplatePluginInterface
{
    /**
     * @return array<string>
     */
    public function getTwigTemplatePaths(): array;

    public function getTwigNamespace(): ?string;

    public function isTwigTemplatesPrepend(): bool;
}
