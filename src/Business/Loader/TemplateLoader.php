<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Micro\Plugin\Twig\Plugin\TwigTemplatePluginInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Loader\FilesystemLoader;

class TemplateLoader implements LoaderInterface
{
    /**
     * @throws LoaderError
     */
    public function load(Environment $environment, object $plugin): void
    {
        $loader = $environment->getLoader();
        if (!$loader instanceof FilesystemLoader) {
            throw new \InvalidArgumentException(sprintf('The loader must be an instance of %s', FilesystemLoader::MAIN_NAMESPACE));
        }

        if (!$plugin instanceof TwigTemplatePluginInterface) {
            @trigger_error(sprintf('The plugin must be an instance of %s', TwigTemplatePluginInterface::class));

            return;
        }

        $namespace = $plugin->getTwigNamespace();
        $paths = $plugin->getTwigTemplatePaths();

        $this->registerTemplates($loader, $paths, $namespace);
    }

    /**
     * @param array<string> $paths
     *
     * @return void
     *
     * @throws LoaderError
     */
    protected function registerTemplates(FilesystemLoader $loader, array $paths, string $namespace = null)
    {
        foreach ($paths as $path) {
            $args = [$path];
            if (null !== $namespace) {
                $args[] = $namespace;
            }
            $loader->addPath(...$args);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function supports(object $plugin): bool
    {
        return $plugin instanceof TwigTemplatePluginInterface;
    }
}
