<?php

namespace Micro\Plugin\Twig\Business\Loader;

use Micro\Framework\Kernel\KernelInterface;
use Twig\Environment;

class LoaderProcessor implements LoaderProcessorInterface
{
    /**
     * @param KernelInterface $appKernel
     * @param LoaderInterface[] $loaders
     */
    public function __construct(
        private readonly KernelInterface $appKernel,
        private readonly iterable $loaders
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
     * @param object $plugin
     * @return void
     */
    protected function process(Environment $environment, object $plugin): void
    {
        foreach ($this->loaders as $loader) {
            if(!$loader->supports($plugin)) {
                continue;
            }

            $loader->load($environment, $plugin);
        }
    }
}
