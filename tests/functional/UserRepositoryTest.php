<?php namespace App\Tests;

use App\Entity\User;
use App\Repository\UserRepository;

class UserRepositoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \App\Tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testWhenCallGetByIdExistsExpectedNull() : void
    {
        $userRepository = $this->getModule('Doctrine2')->_getEntityManager()->getRepository(User::class);
        $result = $userRepository->getById(7);
        $this->assertIsObject($result);
    }
}