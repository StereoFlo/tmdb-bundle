<?php

declare(strict_types = 1);

namespace Stereoflo\TmdbBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('tmdb');

        $treeBuilder
            ->getRootNode()
            ->children()
            ->scalarNode('api_key')->isRequired()->end()
            ->scalarNode('language')->isRequired()->end()
            ->end();

        return $treeBuilder;
    }
}
