<?php

namespace App\Repository;

use App\Entity\Payment;
use App\Entity\PaymentTypes;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Payment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Payment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Payment[]    findAll()
 * @method Payment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaymentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Payment::class);
    }

    public function store(Payment $payment)
    {
        $this->getEntityManager()->persist($payment);
        $this->getEntityManager()->flush();

        return true;
    }

    public function delete(Payment $payment)
    {
        if($payment)
        {
            $this->getEntityManager()->remove($payment);
            $this->getEntityManager()->flush();
            return true;
        }else{
            return false;
        }
    }

    public function getById($id)
    {
        $user = $this->find($id);

        return $user === null? false : $user;
    }

}
