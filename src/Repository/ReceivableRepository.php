<?php

namespace App\Repository;

use App\Entity\Receivable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Receivable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Receivable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Receivable[]    findAll()
 * @method Receivable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReceivableRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Receivable::class);
    }

    // /**
    //  * @return Receivable[] Returns an array of Receivable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Receivable
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
