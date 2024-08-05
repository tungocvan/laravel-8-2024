<?php
namespace Modules\Help\Repositories;
use App\Repositories\BaseRepository;
use Modules\Help\Models\Help;
use Modules\Help\Repositories\HelpRepositoryInterface;

class HelpRepository extends BaseRepository implements HelpRepositoryInterface
{
    public function getModel()
    {
        return Help::class;
    }
    public function getHelp()
    {
        return $this->model->all();
    }
}