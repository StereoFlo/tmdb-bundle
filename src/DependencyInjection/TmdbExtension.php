<?php

declare(strict_types = 1);

namespace Stereoflo\TmdbBundle\DependencyInjection;

use Exception;
use Stereoflo\TmdbBundle\Factory;
use Stereoflo\TmdbBundle\Service;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class TmdbExtension extends Extension
{
    /**
     * @param array<string, mixed> $configs
     *
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $container->setParameter('tmdb.api_key', $config['api_key']);
        $container->setParameter('tmdb.language', $config['language']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $this->manualServicesLoad($container);
    }

    protected function manualServicesLoad(ContainerBuilder $container): void
    {
        $container
            ->register('tmdb.factory', Factory::class)
            ->setArgument('$apiKey', '%tmdb.language%')
            ->setArgument('$language', '%tmdb_api.language%');

        $container
            ->register('tmdb.service', Service::class)
            ->setArgument('$factory', new Reference('tmdb.factory'))
            ->setAutowired(true);
    }
}
