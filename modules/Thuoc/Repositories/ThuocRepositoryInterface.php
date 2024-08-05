<?php
namespace Modules\Thuoc\Repositories;
use App\Repositories\RepositoryInterface;
interface ThuocRepositoryInterface extends RepositoryInterface
{
    public function getThuoc();
}