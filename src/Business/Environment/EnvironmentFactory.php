<?php

namespace Micro\Plugin\Twig\Business\Environment;

use Micro\Plugin\Twig\Business\Loader\LoaderProcessorInterface;
use Micro\Plugin\Twig\TwigPluginConfigurationInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Loader\LoaderInterface;

class EnvironmentFactory implements EnvironmentFactoryInterface
{
    /**
     * @param TwigPluginConfigurationInterface $pluginConfiguration
     * @param LoaderProcessorInterface $environmentLoaderProcessor
     */
    public function __construct(
    private TwigPluginConfigurationInterface $pluginConfiguration,
    private LoaderProcessorInterface $environmentLoaderProcessor
    )
    {
    }

    /**
     * @return Environment
     */
    public function create(): Environment
    {
        $twig = $this->createEnvitonment();

        $this->environmentLoaderProcessor->load($twig);

        return $twig;
    }

    /**
     * @return Environment
     */
    protected function createEnvitonment(): Environment
    {
        return new Environment(
            $this->createLoader(),
            $this->createEnvironmentConfigurationArray()
        );
    }

    /**
     * @return LoaderInterface
     */
    protected function createLoader(): LoaderInterface
    {
        return new FilesystemLoader();
    }

    /**
     * @return array
     */
    protected function createEnvironmentConfigurationArray(): array
    {
        return $this->pluginConfiguration->getConfigurationArray();
    }
}
