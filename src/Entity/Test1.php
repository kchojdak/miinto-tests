<?php

declare (strict_types=1);

namespace App\Entity;

/**
 * Class Test1
 *
 * @package App\Entity
 */
class Test1 implements \Miinto\Storage\EntityInterface
{
    protected $id;
    protected $param1;
    protected $param2;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getParam1()
    {
        return $this->param1;
    }

    /**
     * @param mixed $param1
     */
    public function setParam1($param1)
    {
        $this->param1 = $param1;
    }

    /**
     * @return mixed
     */
    public function getParam2()
    {
        return $this->param2;
    }

    /**
     * @param mixed $param2
     */
    public function setParam2($param2)
    {
        $this->param2 = $param2;
    }
}