<?php declare(strict_types=1);

namespace JonasPardon\Cms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseModel extends Model
{
    public function toResource($models, bool $multiple = true)
    {
        if ($multiple) {
            return JsonResource::collection($models);
        }

        return new JsonResource($models);
    }
}
