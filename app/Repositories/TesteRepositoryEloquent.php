<?php

namespace finance\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use finance\Repositories\TesteRepository;
use finance\Entities\Teste;
use finance\Validators\TesteValidator;

/**
 * Class TesteRepositoryEloquent.
 *
 * @package namespace finance\Repositories;
 */
class TesteRepositoryEloquent extends BaseRepository implements TesteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Teste::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
