<?php


namespace Src\Repositories;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

/**
 * This class includes the methods that the application currently needs to connect to the external api
 * Class ApiRepository
 * @package Src\Repositories
 */
class ApiRepository implements ApiRepositoryInterface
{
    public function __construct(private string $endpoint){}

    /**
     * @throws RequestException
     */
    public function all(array $filters): array
    {
        return Http::get(self::HTTPS_API_STACKEXCHANGE_COM_2_2 . $this->endpoint, $filters)
            ->throw()
            ->json();
    }
}
