<?php

declare (strict_types=1);

namespace App\Repository;

/**
 * Class Test2
 *
 * @package App\Repository
 */
class Test2 extends \Miinto\Storage\Repository\Pgsql\AbstractBaseRepository
{
    public function getAdapter()
    {
        return \App\Entity\Test2::class;
    }
}