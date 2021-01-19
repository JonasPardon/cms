<?php declare(strict_types=1);

namespace JonasPardon\Cms\Contracts;

use Illuminate\Support\Str;

abstract class ApiFactory
{
    protected ?string $type;

    protected string $baseDirectory = 'App\\Models\\';

    public function create(string $entity) {
        $guessed = $this->guessClassName($entity);

        if (!class_exists($guessed)) {
            $guessed = $this->guessClassName($entity, true);
        }

        if (class_exists($guessed)) {
            return app()->make($guessed);
        }

        try {
            $entity = Str::studly($entity);
            $result = app("{$entity}{$this->type}");
        } catch (\Exception $e) {
            $singular = Str::studly(Str::singular($entity));
            $result = app("{$singular}{$this->type}");
        }

        return $result;
    }

    protected function guessClassName(string $entity, bool $singular = false): string
    {
        if ($singular) {
            $entity = Str::studly($entity);
        } else {
            $entity = Str::studly(Str::singular($entity));
        }

        return $this->getBaseDirectory() . $entity . $this->type;
    }

    protected function getBaseDirectory(): string
    {
        return $this->baseDirectory;
    }
}
