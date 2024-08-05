<?php
namespace Modules\Wordpress\Repositories;
use App\Repositories\BaseRepository;
use Modules\Wordpress\Models\Wordpress;
use Modules\Wordpress\Repositories\WordpressRepositoryInterface;

class WordpressRepository extends BaseRepository implements WordpressRepositoryInterface
{
    public function getModel()
    {
        return Wordpress::class;
    }
    public function getWordpress()
    {
        return $this->model->all();
    }
}