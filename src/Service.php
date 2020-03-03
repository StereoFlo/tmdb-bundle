<?php

declare(strict_types = 1);

namespace Stereoflo\TmdbBundle;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use TMDB\Exception\EmptyQueryParamException;
use TMDB\Exception\InvalidParamException;
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
     * @return array<mixed, mixed>
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws EmptyQueryParamException
     * @throws InvalidParamException
     *
     * @throws ClientExceptionInterface
     */
    public function get(AbstractSection $abstractSection): array
    {
        return $this->factory
            ->create()
            ->setSection($abstractSection)
            ->get();
    }
}
