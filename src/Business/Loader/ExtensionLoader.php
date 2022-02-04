<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Micro\Framework\Kernel\Plugin\ApplicationPluginInterface;
use Micro\Plugin\Twig\Plugin\TwigExtensionPluginInterface;
use Twig\Environment;

class ExtensionLoader implements LoaderInterface
{
    /**
     * @param Environment $environment
     * @param TwigExtensionPluginInterface $plugin
     *
     * @return void
     */
    public function load(Environment $environment, mixed $plugin): void
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
    public function supports(ApplicationPluginInterface $plugin): bool
    {
        return $plugin instanceof TwigExtensionPluginInterface;
    }
}
