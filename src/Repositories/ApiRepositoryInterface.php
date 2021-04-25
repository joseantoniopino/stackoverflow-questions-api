<?php


namespace Src\Repositories;


interface ApiRepositoryInterface
{
    const HTTPS_API_STACKEXCHANGE_COM_2_2 = 'https://api.stackexchange.com/2.2';
    const QUESTIONS_ENDPOINT = '/questions';

    public function all(array $filters): array;
}
