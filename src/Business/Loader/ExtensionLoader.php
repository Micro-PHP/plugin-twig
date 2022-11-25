<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Micro\Plugin\Twig\Plugin\TwigExtensionPluginInterface;
use Twig\Environment;

class ExtensionLoader implements LoaderInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(Environment $environment, TwigExtensionPluginInterface $plugin): void
    {
        $this->provideExtensions($environment, $plugin);
    }

    /**
     * @param Environment $environment
     * @param TwigExtensionPluginInterface $extensionProvider
     *
     * @return void
     */
    protected function provideExtensions(Environment $environment, TwigExtensionPluginInterface $extensionProvider): void
    {
        foreach ($extensionProvider->provideTwigExtensions() as $extension) {
            $environment->addExtension($extension);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function supports(object $plugin): bool
    {
        return $plugin instanceof TwigExtensionPluginInterface;
    }
}
