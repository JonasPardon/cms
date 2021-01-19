<?php declare(strict_types=1);

namespace JonasPardon\Cms\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
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

    private function setup(string $entity)
    {
        $this->entity = $entity;
        $this->repository = $this->repositoryFactory
            ->create($this->entity);
    }

    public function get(string $entity, ?string $definer = null)
    {
        $this->setup($entity);

        if (!is_null($definer)) {
            return $this->show($entity, $definer);
        }

        return $this->index($entity);
    }

    public function index(string $entity)
    {
        return $this->repository->index();
    }

    public function show(string $entity, string $definer): JsonResource
    {

    }
}
