<?php

namespace Micro\Plugin\Twig;

use Micro\Framework\Kernel\Configuration\PluginConfiguration;

class TwigPluginConfiguration extends PluginConfiguration implements TwigPluginConfigurationInterface
{
    protected const CFG_CHARSET             = 'TWIG_CHARSET';
    protected const CFG_IS_DEBUG            = 'TWIG_DEBUG';
    protected const CFG_CACHE               = 'TWIG_CACHE';
    protected const CFG_IS_AUTO_RELOAD      = 'TWIG_AUTO_RELOAD';
    protected const CFG_IS_STRICT_VARIABLES = 'TWIG_STRICT_VARIABLES';
    protected const CFG_OPTIMIZATIONS       = 'TWIG_OPTIMIZATIONS';

    /**
     * {@inheritDoc}
     */
    public function getConfigurationArray(): array
    {
        return [
            'debug' => $this->isDebug(),
            'charset' => $this->getCharset(),
            'cache' => $this->getCachePath() ?? false,
            'auto_reload' => $this->isAutoReload(),
            'strict_variables' => $this->isStrictVariables(),
            'optimizations' => $this->getOptimizations(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function isDebug(): bool
    {
        return (bool)$this->configuration->get(self::CFG_IS_DEBUG, self::IS_DEBUG_DEFAULT);
    }

    /**
     * {@inheritDoc}
     */
    public function getCharset(): string
    {
        return $this->configuration->get(self::CFG_CHARSET, self::CHARSET_DEFAULT);
    }

    /**
     * {@inheritDoc}
     */
    public function getCachePath(): ?string
    {
        return $this->configuration->get(self::CFG_CACHE, self::CACHE_DEFAULT);
    }

    /**
     * {@inheritDoc}
     */
    public function isAutoReload(): bool
    {
        return (bool)$this->configuration->get(self::CFG_IS_AUTO_RELOAD, self::IS_AUTO_RELOAD_DEFAULT);
    }

    /**
     * {@inheritDoc}
     */
    public function isStrictVariables(): bool
    {
        return (bool)$this->configuration->get(self::CFG_IS_STRICT_VARIABLES, self::IS_STRICT_VARIABLES_DEFAULT);
    }

    /**
     * {@inheritDoc}
     */
    public function getOptimizations(): int
    {
        return (int)$this->configuration->get(self::CFG_OPTIMIZATIONS, self::OPTIMIZATIONS_DEFAULT);
    }
}
