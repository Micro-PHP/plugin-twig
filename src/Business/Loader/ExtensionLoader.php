<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Micro\Plugin\Twig\Plugin\TwigExtensionPluginInterface;
use Twig\Environment;

class ExtensionLoader implements LoaderInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(Environment $environment, object $plugin): void
    {
        if (!$plugin instanceof TwigExtensionPluginInterface) {
            @trigger_error(sprintf('The plugin must be an instance of %s', TwigExtensionPluginInterface::class));

            return;
        }

        $this->provideExtensions($environment, $plugin);
    }

    protected function provideExtensions(Environment $environment, TwigExtensionPluginInterface $extensionProvider): void
    {
        foreach ($extensionProvider->provideTwigExtensions() as $extension) {
            $environment->addExtension($extension);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function supports(object $plugin): bool
    {
        return $plugin instanceof TwigExtensionPluginInterface;
    }
}
