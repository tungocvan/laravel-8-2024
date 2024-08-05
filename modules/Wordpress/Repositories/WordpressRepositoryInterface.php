<?php
namespace Modules\Wordpress\Repositories;
use App\Repositories\RepositoryInterface;
interface WordpressRepositoryInterface extends RepositoryInterface
{
    public function getWordpress();
}