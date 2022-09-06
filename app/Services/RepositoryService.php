<?php

namespace App\Services;

use App\Models\Repository\Repository;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RepositoryService
{
    private Repository $repositories;
    private GithubService $githubService;

    public function __construct(Repository $repositories, GithubService $githubService)
    {
        $this->repositories = $repositories;
        $this->githubService = $githubService;
    }

    public function getRepositoriesList()
    {
        $repositories = $this->repositories->query()->latest()->get();

        return view('repositories', compact('repositories'));
    }

    public function storeRepositoriesFromGithubApi(string $org)
    {
        try {

            $githubRepositories = $this->githubService->getRepositories($org);

            foreach ($githubRepositories as $repository){

                $commits = $this->githubService->getCommits($org, $repository['name']);

                if($commits->count() >= 10){

                    $this->repositories->query()->firstOrCreate([
                        'name' => $repository['name'],
                        'url' => $repository['html_url'],
                        'org_name' => $org,
                        'linguage' => $repository['language'] ?? null
                    ]);

                }
            }

            return response()->json([
                'message' => 'Repositorios cadastrados com sucesso'
            ], 201);

        } catch (NotFoundHttpException $e) {

            return response()->json([
                'message' => 'Organização não encontrada'
            ], 404);

        } catch (\Exception $e) {

            Log::info('Falha ao cadastrar repositorios', [$e->getMessage()]);

            return response()->json([
                'message' => 'Falha ao cadastrar repositorios'
            ], 500);

        }
    }
}
