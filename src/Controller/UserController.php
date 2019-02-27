<?php

namespace App\Controller;

use App\Entity\User;
use App\Handler\DeleteHandler;
use App\Handler\UserHandler;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractFOSRestController
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/user", name="users", methods={"GET"})
     * @return JsonResponse
     */
    public function users()
    {
        return new JsonResponse($this->repository->findAll(),200);
    }

    /**
     * @Route("/user/{id}", name="user", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function user(Request $request)
    {
        return new JsonResponse($this->repository->getById($request->get('id')),200);
    }


    /**
     * @Route("/user", name="delete_user", methods={"DELETE"})
     * @param DeleteHandler $handler
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteUser(DeleteHandler $handler, Request $request)
    {
        return new JsonResponse($handler->handle(User::class,$request->get('id')), 200);
    }

    /**
     * @Route("/user", name="add_user", methods={"POST"})
     * @param Request $request
     * @param UserHandler $handler
     * @return mixed
     */
    public function storeUser(Request $request, UserHandler $handler)
    {
        return new JsonResponse($this->repository->store($handler->handle($request->get('first_name'), $request->get('last_name'))), 200);
    }

    /**
     * @Route("/user", name="update_user", methods={"PUT"})
     * @param Request $request
     * @param UserHandler $handler
     * @return JsonResponse
     */
    public function updateUser(Request $request, UserHandler $handler)
    {
        return new JsonResponse($this->repository->store($handler->handle($request->get('first_name'), $request->get('last_name'), $request->get('id'))), 200);
    }

}
