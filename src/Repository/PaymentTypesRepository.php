<?php

namespace App\Repository;

use App\Entity\Payment;
use App\Entity\PaymentTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PaymentTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaymentTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaymentTypes[]    findAll()
 * @method PaymentTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaymentTypesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PaymentTypes::class);
    }

    /**
     * @param $id
     * @return bool
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(int $id):bool
    {
        $this->getEntityManager()->remove($this->find($id));
        $this->getEntityManager()->flush();

        return true;
    }

    public function add($request)
    {
        $user = new Payment();

        $user->setFirstName($request->get('first_name'));
        $user->setLastName($request->get('last_name'));
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return true;
    }

    /**
     * @param $request
     * @return User|null
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update($request)
    {
        $user = $this->find($request->get('id'));
        $user->setFirstName($request->get('first_name'));
        $user->setLastName($request->get('last_name'));
        $this->getEntityManager()->flush();

        return $user;
    }


    // /**
    //  * @return PaymentTypes[] Returns an array of PaymentTypes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PaymentTypes
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
