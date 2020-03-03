<?php

declare(strict_types = 1);

namespace Stereoflo\TmdbBundle;

use TMDB\Credentials;
use TMDB\Exception\InvalidParamException;
use TMDB\TMDB;

class Factory
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $language;

    public function __construct(string $apiKey, string $language)
    {
        $this->apiKey   = $apiKey;
        $this->language = $language;
    }

    /**
     * @throws InvalidParamException
     */
    public function create(): TMDB
    {
        return $this
            ->getTmdb()
            ->setCredentials($this->getCredentials())
            ->setLanguage($this->language);
    }

    private function getCredentials(): Credentials
    {
        return new Credentials($this->apiKey);
    }

    private function getTmdb(): TMDB
    {
        return new TMDB();
    }
}
