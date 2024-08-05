<?php
namespace Modules\Thuoc\Repositories;
use App\Repositories\BaseRepository;
use Modules\Thuoc\Models\Thuoc;
use Modules\Thuoc\Repositories\ThuocRepositoryInterface;

class ThuocRepository extends BaseRepository implements ThuocRepositoryInterface
{
    public function getModel()
    {
        return Thuoc::class;
    }
    public function getThuoc()
    {
        return $this->model->all();
    }
}