<?php

namespace Micro\Plugin\Twig\Plugin;

interface TwigTemplatePluginInterface
{
    /**
     * @return array<string>
     */
    public function getTwigTemplatePaths(): array;

    /**
     * @return string|null
     */
    public function getTwigNamespace(): ?string;

    /**
     * @return bool
     */
    public function isTwigTemplatesPrepend(): bool;
}
