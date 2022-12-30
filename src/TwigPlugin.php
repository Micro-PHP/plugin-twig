<?php

namespace Micro\Plugin\Twig;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\KernelInterface;
use Micro\Framework\Kernel\Plugin\ConfigurableInterface;
use Micro\Framework\Kernel\Plugin\DependencyProviderInterface;
use Micro\Framework\Kernel\Plugin\PluginConfigurationTrait;
use Micro\Plugin\Twig\Business\Environment\EnvironmentFactory;
use Micro\Plugin\Twig\Business\Environment\EnvironmentFactoryInterface;
use Micro\Plugin\Twig\Business\Loader\ExtensionLoader;
use Micro\Plugin\Twig\Business\Loader\LoaderInterface;
use Micro\Plugin\Twig\Business\Loader\LoaderProcessor;
use Micro\Plugin\Twig\Business\Loader\LoaderProcessorInterface;
use Micro\Plugin\Twig\Business\Loader\TemplateLoader;
use Micro\Plugin\Twig\Business\Render\TwigRendererFactory;
use Micro\Plugin\Twig\Business\Render\TwigRendererFactoryInterface;

/**
 * @psalm-suppress ImplementedReturnTypeMismatch
 * @psalm-suppress MissingConstructor
 *
 * @method TwigPluginConfigurationInterface configuration()
 */
class TwigPlugin implements DependencyProviderInterface, ConfigurableInterface
{
    use PluginConfigurationTrait;

    private readonly KernelInterface $kernel;

    /**
     * {@inheritdoc}
     */
    public function provideDependencies(Container $container): void
    {
        $container->register(TwigFacadeInterface::class, function (
            KernelInterface $kernel
        ) {
            /** @psalm-suppress InaccessibleProperty */
            $this->kernel = $kernel;

            return $this->createTwigFacade();
        });
    }

    protected function createTwigFacade(): TwigFacadeInterface
    {
        return new TwigFacade(
            $this->createTwigRendererFactory()
        );
    }

    protected function createTwigRendererFactory(): TwigRendererFactoryInterface
    {
        return new TwigRendererFactory(
            $this->createEnvironmentFactory()
        );
    }

    protected function createEnvironmentFactory(): EnvironmentFactoryInterface
    {
        return new EnvironmentFactory(
            $this->configuration(),
            $this->createLoaderProcessor()
        );
    }

    protected function createLoaderProcessor(): LoaderProcessorInterface
    {
        return new LoaderProcessor($this->kernel, $this->createLoaders());
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
}
