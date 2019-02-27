<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReceivableController extends AbstractFOSRestController
{
    /**
     * @Route("/receivables", name="receivables")
     */
    public function getReceivables()
    {
        return new JsonResponse('get all',200);
    }

    /**
     * @Route("/receivable/{id}", name="receivable")
     * @param Request $request
     * @return mixed
     */
    public function getReceivable(Request $request)
    {
        return new JsonResponse('get',200);
    }

    /**
     * @Route("/receivable/delete/{id}", name="delete_receivable")
     * @param Request $request
     * @return mixed
     */
    public function deleteReceivable(Request $request)
    {
        return new JsonResponse( 'delete', 200);
    }

    /**
     * @Route("/receivable/add/{receivable}", name="add_receivable")
     * @param Request $request
     * @return mixed
     */
    public function addReceivable(Request $request)
    {
        return new JsonResponse( 'add', 200);
    }

    /**
     * @Route("/receivable/update/{id}", name="update_receivable")
     * @param Request $request
     * @return mixed
     */
    public function updateReceivable(Request $request)
    {
        return new JsonResponse( 'update', 200);
    }
}
