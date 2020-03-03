<?php

declare(strict_types = 1);

namespace StereoFlo\TmdbBundle;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use TMDB\Exception\EmptyQueryParamException;
use TMDB\Section\AbstractSection;

class Service
{
    /**
     * @var Factory
     */
    private $factory;

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws EmptyQueryParamException
     *
     * @return array<mixed, mixed>
     */
    public function get(AbstractSection $abstractSection): array
    {
        return $this->factory
            ->create()
            ->setSection($abstractSection)
            ->get();
    }
}
