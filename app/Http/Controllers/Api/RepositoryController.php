<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RepositoryService;

class RepositoryController extends Controller
{
    private RepositoryService $repositoryService;

    public function __construct(RepositoryService $repositoryService)
    {
        $this->repositoryService = $repositoryService;
    }

    public function store(string $org)
    {
        return $this->repositoryService->storeRepositoriesFromGithubApi($org);
    }
}
