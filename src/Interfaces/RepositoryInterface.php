<?php declare(strict_types=1);

namespace JonasPardon\Cms\Interfaces;

interface RepositoryInterface
{
    public function index();

    public function show($id);
}
