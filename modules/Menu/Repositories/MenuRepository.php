<?php
namespace Modules\Menu\Repositories;
use App\Repositories\BaseRepository;
use Modules\Menu\Models\Menu;
use Modules\Menu\Repositories\MenuRepositoryInterface;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{
    public function getModel()
    {
        return Menu::class;
    }
    public function getMenu()
    {
        return $this->model->all();
    }
}