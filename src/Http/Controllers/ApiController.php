<?php declare(strict_types=1);

namespace JonasPardon\Cms\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use JonasPardon\Cms\Models\BaseModel;
use JonasPardon\Cms\Repositories\EloquentRepository;
use JonasPardon\Cms\Services\RepositoryFactory;

class ApiController
{
    private RepositoryFactory $repositoryFactory;

    private string $entity;

    private EloquentRepository $repository;

    public function __construct(RepositoryFactory $repositoryFactory)
    {
        $this->repositoryFactory = $repositoryFactory;
    }

    private function setup(string $entity): void
    {
        $this->entity = $entity;

        $this->repository = $this->repositoryFactory
            ->create($this->entity);
    }

    public function get(string $entity, ?string $definer = null)
    {
        $this->setup($entity);

        if (!is_null($definer)) {
            return $this->show($definer);
        }

        return $this->index();
    }

    private function index()
    {
        $models = $this->repository->index();

        return $this->buildResponse($models->first(), $models);
    }

    private function show(string $definer)
    {
        $model = $this->repository->show($definer);

        return $this->buildResponse($model);
    }

    private function buildResponse(BaseModel $model, ?Collection $models = null)
    {
        return $model->toResource($models ?? $model, isset($models));
    }
}
