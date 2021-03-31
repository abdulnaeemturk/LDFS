<?php namespace App\Repositories\Project;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project\Project;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\Project\ProjectRepositoryInterface;
use Illuminate\Support\Collection;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    public function __construct(Project $model)
    {
        parent::__construct($model);
    }
}