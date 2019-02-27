<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 26.02.19
 * Time: 14:30
 */

namespace App\Handler;


use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserHandler
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($name, $surname, $id = false)
    {
        $user = $id? $this->repository->getById($id) : new User();
        $user->setFirstName($name);
        $user->setLastName($surname);

        return $user;
    }
}