<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Src\AddQuestionsFilters;
use Src\Exceptions\ApiConnectionException;
use Src\PrepareFilters;
use Src\Repositories\ApiRepository;
use Src\Repositories\ApiRepositoryInterface;

class QuestionsController extends Controller
{

    private ApiRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new ApiRepository(ApiRepositoryInterface::QUESTIONS_ENDPOINT);
    }

    public function getAllQuestions(Request $request): array
    {
        $params = new PrepareFilters($request->all());
        $questionsFilters = new AddQuestionsFilters($params->getFilters());
        $filters = $questionsFilters->getQuestionsFilters();

        try {
            return $this->repository->all($filters);
        } catch (RequestException $e) {
            throw new ApiConnectionException($e->getMessage(), $e->getCode());
        }

    }
}
