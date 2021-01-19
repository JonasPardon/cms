<?php declare(strict_types=1);

namespace JonasPardon\Cms\Services;

use JonasPardon\Cms\Contracts\ApiFactory;

class RepositoryFactory extends ApiFactory
{
    protected ?string $type = 'Repository';

    protected string $baseDirectory = 'App\\Repositories\\';
}
