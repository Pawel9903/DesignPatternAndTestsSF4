<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Object_;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function store(User $user)
    {
        try{
            $this->getEntityManager()->persist($user);
            $this->getEntityManager()->flush();

            return true;
        }catch (\Exception $exception)
        {
            return false;
        }

    }

    public function getById($id)
    {
        $user = $this->find($id);

        return $user === null? false : $user;
    }

    public function findOrFail($id){
        var_dump($id);
        return $id? $this->find($id) : false;
    }
}
