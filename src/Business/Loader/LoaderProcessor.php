<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Micro\Framework\Kernel\KernelInterface;
use Micro\Framework\Kernel\Plugin\ApplicationPluginInterface;
use Micro\Plugin\Twig\Plugin\TwigExtensionPluginInterface;
use Twig\Environment;

class LoaderProcessor implements LoaderProcessorInterface
{
    /**
     * @param KernelInterface $appKernel
     * @param LoaderInterface[] $loaders
     */
    public function __construct(
    private KernelInterface $appKernel,
    private iterable $loaders
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function load(Environment $environment): void
    {
        foreach ($this->appKernel->plugins() as $plugin) {
            $this->process($environment, $plugin);
        }
    }

    /**
     * @param Environment $environment
     * @param ApplicationPluginInterface $plugin
     * @return void
     */
    protected function process(Environment $environment, ApplicationPluginInterface $plugin): void
    {
        foreach ($this->loaders as $loader) {
            if(!$loader->supports($plugin)) {
                continue;
            }

            $loader->load($environment, $plugin);
        }
    }
}
