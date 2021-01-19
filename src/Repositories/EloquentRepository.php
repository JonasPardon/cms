<?php declare(strict_types=1);

namespace JonasPardon\Cms\Repositories;

use JonasPardon\Cms\Interfaces\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;
    
    public function index()
    {
        return $this->model->get();
    }

    public function show($id)
    {
        return $this->model->find($id);
    }
}
