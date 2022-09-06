<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GithubService
{
    public function getRepositories(string $org): Collection
    {
        $request = Http::get("https://api.github.com/orgs/{$org}/repos", [
            'per_page' => 10,
            'sort' => 'created'
        ]);

        if($request->status() != 200) {
            throw new NotFoundHttpException('Organização não encontrada');
        }

        return $request->collect();
    }

    public function getCommits(string $org, string $repositoryName): Collection
    {
        $request = Http::get("https://api.github.com/repos/{$org}/{$repositoryName}/commits");

        return $request->collect();
    }
}
