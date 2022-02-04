<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Micro\Framework\Kernel\Plugin\ApplicationPluginInterface;
use Micro\Plugin\Twig\Plugin\TwigTemplatePluginInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Loader\FilesystemLoader;

class TemplateLoader implements LoaderInterface
{
    /**
     * @param Environment $environment
     * @param TwigTemplatePluginInterface $plugin
     *
     * @return void
     *
     * @throws LoaderError
     */
    public function load(Environment $environment, mixed $plugin): void
    {

        /** @var FilesystemLoader $loader */
        $loader    = $environment->getLoader();
        $namespace = $plugin->getTwigNamespace();
        $paths     = $plugin->getTwigTemplatePaths();

        $this->registerTemplates($loader, $paths, $namespace);
    }

    /**
     * @param FilesystemLoader $loader
     * @param array $paths
     * @param string|null $namespace
     *
     * @return void
     *
     * @throws LoaderError
     */
    protected function registerTemplates(FilesystemLoader $loader, array $paths, string $namespace = null)
    {
        foreach ($paths as $path) {
            $loader->addPath($path, $namespace);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function supports(ApplicationPluginInterface $plugin): bool
    {
        return $plugin instanceof TwigTemplatePluginInterface;
    }
}
