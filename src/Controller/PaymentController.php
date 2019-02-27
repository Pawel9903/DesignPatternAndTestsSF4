<?php

namespace App\Controller;

use App\Entity\Payment;
use App\Handler\DeleteHandler;
use App\Handler\PaymentHandler;
use App\Repository\PaymentRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PaymentController extends AbstractFOSRestController
{
    private $repository;

    public function __construct(PaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/payment", name="payments", methods={"GET"})
     */
    public function payments()
    {
        return new JsonResponse($this->repository->findAll(),200);    }

    /**
     * @Route("/payment/{id}", name="payment" , methods={"GET"})
     * @param Request $request
     * @return mixed
     */
    public function payment(Request $request)
    {
        return new JsonResponse($this->repository->getById($request->get('id')),200);
    }

    /**
     * @Route("/payment", name="delete_payment", methods={"DELETE"})
     * @param DeleteHandler $handler
     * @param Request $request
     * @return mixed
     */
    public function deletePayment(DeleteHandler $handler, Request $request)
    {
        return new JsonResponse($handler->handle(Payment::class, $request->get('id')), 200);
    }

    /**
     * @Route("/payment", name="add_payment", methods={"POST"})
     * @param PaymentHandler $handler
     * @param Request $request
     * @return mixed
     */
    public function storePayment(PaymentHandler $handler, Request $request)
    {
        return new JsonResponse($this->repository->store($handler->handle($request)), 200);
    }

    /**
     * @Route("/payment", name="update_payment", methods={"PUT"})
     * @param PaymentHandler $handler
     * @param Request $request
     * @return mixed
     */
    public function updatePayment(PaymentHandler $handler, Request $request)
    {
        return new JsonResponse($this->repository->store($handler->handle($request)), 200);
    }


}
