<?php

namespace Micro\Plugin\Twig\Business\Environment;

use Micro\Plugin\Twig\Business\Loader\LoaderProcessorInterface;
use Micro\Plugin\Twig\TwigPluginConfigurationInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Loader\LoaderInterface;

class EnvironmentFactory implements EnvironmentFactoryInterface
{
    public function __construct(
    private TwigPluginConfigurationInterface $pluginConfiguration,
    private LoaderProcessorInterface $environmentLoaderProcessor
    ) {
    }

    public function create(): Environment
    {
        $twig = $this->createEnvironment();

        $this->environmentLoaderProcessor->load($twig);

        return $twig;
    }

    protected function createEnvironment(): Environment
    {
        return new Environment(
            $this->createLoader(),
            $this->createEnvironmentConfigurationArray()
        );
    }

    protected function createLoader(): LoaderInterface
    {
        return new FilesystemLoader();
    }

    /**
     * @return array<string, bool|int|string>
     */
    protected function createEnvironmentConfigurationArray(): array
    {
        return $this->pluginConfiguration->getConfigurationArray();
    }
}
