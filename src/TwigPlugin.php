<?php

namespace Micro\Plugin\Twig;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\AbstractPlugin;
use Micro\Kernel\App\AppKernelInterface;
use Micro\Plugin\Twig\Business\Environment\EnvironmentFactory;
use Micro\Plugin\Twig\Business\Environment\EnvironmentFactoryInterface;
use Micro\Plugin\Twig\Business\Loader\LoaderInterface;
use Micro\Plugin\Twig\Business\Loader\LoaderProcessor;
use Micro\Plugin\Twig\Business\Loader\LoaderProcessorInterface;
use Micro\Plugin\Twig\Business\Loader\ExtensionLoader;
use Micro\Plugin\Twig\Business\Loader\TemplateLoader;
use Micro\Plugin\Twig\Business\Render\TwigRendererFactory;
use Micro\Plugin\Twig\Business\Render\TwigRendererFactoryInterface;

/**
 * @method TwigPluginConfigurationInterface configuration()
 */
class TwigPlugin extends AbstractPlugin
{
    protected ?Container $container = null;

    /**
     * {@inheritDoc}
     */
    public function provideDependencies(Container $container): void
    {
        $this->container = $container;

        $container->register(TwigFacadeInterface::class, function (Container $container) {
            return $this->createTwigFacade();
        });
    }

    /**
     * @return TwigFacadeInterface
     */
    protected function createTwigFacade(): TwigFacadeInterface
    {
        return new TwigFacade(
            $this->createTwigRendererFactory()
        );
    }

    /**
     * @return TwigRendererFactoryInterface
     */
    protected function createTwigRendererFactory(): TwigRendererFactoryInterface
    {
        return new TwigRendererFactory(
            $this->createEnvironmentFactory()
        );
    }

    /**
     * @return EnvironmentFactoryInterface
     */
    protected function createEnvironmentFactory(): EnvironmentFactoryInterface
    {
        return new EnvironmentFactory(
            $this->configuration(),
            $this->createLoaderProcessor()
        );
    }

    /**
     * @return LoaderProcessorInterface
     */
    protected function createLoaderProcessor(): LoaderProcessorInterface
    {
        $kernel = $this->lookupKernel();

        return new LoaderProcessor($kernel, $this->createLoaders());
    }

    /**
     * @return LoaderInterface[]
     */
    protected function createLoaders(): array
    {
        return [
            new ExtensionLoader(),
            new TemplateLoader(),
        ];
    }

    /**
     * @return AppKernelInterface
     */
    protected function lookupKernel(): AppKernelInterface
    {
        return $this->container->get(AppKernelInterface::class);
    }
}
