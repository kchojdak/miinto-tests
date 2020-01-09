<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

$config = \Doctrine\ORM\Tools\Setup::createYAMLMetadataConfiguration([__DIR__.'/../config/doctrine'], false, '/tmp/doctrine');
$config->setAutoGenerateProxyClasses(true);

$manager = \Doctrine\ORM\EntityManager::create([
    'driver' => 'pdo_pgsql',
    'host' => '127.0.0.1',
    'user' => 'postgres',
    'password' => 'Mamma1.2',
    'dbname' => 'tests'
], $config);

$repository = new \App\Repository\Test1($manager);

try {
    // CREATE ONE

    $entity1 = new \App\Entity\Test1();
    $entity1->setParam1('param1A');
    $entity1->setParam2('param2A');
    $entity1 = $repository->create($entity1);

    $entity2 = new \App\Entity\Test1();
    $entity2->setParam1('param1B');
    $entity2->setParam2('param2B');
    $entity2 = $repository->create($entity2);

    $entity3 = new \App\Entity\Test1();
    $entity3->setParam1('param1C');
    $entity3->setParam2('param2C');
    $entity3 = $repository->create($entity3);

    $entity4 = new \App\Entity\Test1();
    $entity4->setParam1('param1D');
    $entity4->setParam2('param2D');
    $entity4 = $repository->create($entity4);

    var_dump([
        $entity1,
        $entity2,
        $entity3,
        $entity4,
    ]);

    // UPDATE ONE

    $entity1->setParam1($entity1->getParam1().'_UPDATE_ONE');
    $entity1->setParam2($entity1->getParam2().'_UPDATE_ONE');
    $entity1 = $repository->update($entity1);

    $entity2->setParam1($entity2->getParam1().'_UPDATE_ONE');
    $entity2->setParam2($entity2->getParam2().'_UPDATE_ONE');
    $entity2 = $repository->update($entity2);

    var_dump([
        $entity1,
        $entity2,
    ]);

    // READ ONE

    $entity1 = $repository->read($entity1);
    $entity2 = $repository->read($entity2);

    var_dump([
        $entity1,
        $entity2,
    ]);

    // DELETE ONE

    $entity3 = $repository->delete($entity3);
    $entity4 = $repository->delete($entity4);

    var_dump([
        $entity3,
        $entity4,
    ]);

    // CREATE MANY

    $entity5 = new \App\Entity\Test1();
    $entity5->setParam1('param1E');
    $entity5->setParam2('param2E');

    $entity6 = new \App\Entity\Test1();
    $entity6->setParam1('param1F');
    $entity6->setParam2('param2F');

    $entities = $repository->createMany([
        $entity5,
        $entity6,
    ]);

    var_dump($entities);

    // READ MANY

    $criteria  = new \Miinto\Storage\Collection\Criteria();
    $criteria->addWhere(new \Miinto\Storage\Collection\Criteria\Where('param1', \Miinto\Storage\Collection\Criteria\WhereInterface::TYPE_IN, ['param1E','param1F']));
    $criteria->addWhere(new \Miinto\Storage\Collection\Criteria\Where('param2', \Miinto\Storage\Collection\Criteria\WhereInterface::TYPE_IN, ['param2E','param2F']));

    $entities = $repository->readMany($criteria);

    var_dump($entities);

    // UPDATE MANY

    foreach ($entities as $entity) {
        $entity->setParam1($entity->getParam1().'_UPDATE_MANY');
        $entity->setParam2($entity->getParam2().'_UPDATE_MANY');
    }
    $entities = $repository->updateMany($entities);

    var_dump($entities);

    // DELETE MANY

    $entities = [
        $entity4,
        $entity5,
    ];

    $entities = $repository->deleteMany($entities);

    var_dump($entities);

} catch (\Throwable $t) {
    echo $t->getMessage();
}