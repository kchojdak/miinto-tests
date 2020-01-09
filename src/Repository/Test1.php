<?php


declare (strict_types=1);

namespace App\Repository;

/**
 * Class Test1
 *
 * @package App\Repository
 */
class Test1 extends \Miinto\Storage\Repository\Pgsql\AbstractBaseRepository
{
    public function getAdapter()
    {
        return \App\Entity\Test1::class;
    }
}