<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\RepositoryService;

class RepositoryController extends Controller
{
    private RepositoryService $repositoryService;

    public function __construct(RepositoryService $repositoryService)
    {
        $this->repositoryService = $repositoryService;
    }

    public function index()
    {
        return $this->repositoryService->getRepositoriesList();
    }
}
