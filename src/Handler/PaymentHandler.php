<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 26.02.19
 * Time: 20:16
 */

namespace App\Handler;


use App\Entity\Payment;
use App\Repository\PaymentRepository;
use App\Repository\PaymentTypesRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class PaymentHandler
{
    private $repository;
    private $userRepository;
    private $paymentTypesRepository;
    private $entityManager;

    public function __construct(UserRepository $userRepository, PaymentTypesRepository $paymentTypesRepository, PaymentRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->paymentTypesRepository = $paymentTypesRepository;
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    public function handle($request)
    {
        $payment = $request->get('id')? $this->repository->find($request->get('id')) : new Payment();

        $user = $this->userRepository->getById($request->get('usr_id'))?? null;
        $paymentType = $this->paymentTypesRepository->find($request->get('pty_id'))?? null;

        $user? $payment->setUsr($user) : null;
        $paymentType? $payment->setPty($paymentType) : null;
        $payment->setTotalNet($request->get('total_net'));
        $payment->setTotalGross($request->get('total_gross'));

        return $payment;
    }
}