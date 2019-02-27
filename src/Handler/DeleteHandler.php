<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 26.02.19
 * Time: 15:40
 */

namespace App\Handler;

use Doctrine\ORM\EntityManagerInterface;

class DeleteHandler
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param $className
     * @param $id
     * @return bool
     */
    public function handle($className, $id)
    {
        try{
            $entity = $this->entityManager->getRepository($className)->find($id);
            $this->entityManager->remove($entity);
            $this->entityManager->flush();
            return true;
        }catch (\Exception $exception)
        {
            return false;
        }
    }

}