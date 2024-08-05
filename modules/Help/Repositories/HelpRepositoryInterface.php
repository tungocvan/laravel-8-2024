<?php
namespace Modules\Help\Repositories;
use App\Repositories\RepositoryInterface;
interface HelpRepositoryInterface extends RepositoryInterface
{
    public function getHelp();
}