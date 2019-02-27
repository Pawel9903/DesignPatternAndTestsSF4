<?php namespace App\Tests;

use App\Entity\User;
use App\Handler\UserHandler;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class UserHandlerTest extends \Codeception\Test\Unit
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
        \Mockery::close();
    }

    // tests
    public function testWhenSendNameAndSurnameToUserHandler()
    {
        $userRepo = \Mockery::mock(UserRepository::class);
        $userRepo->shouldReceive('find')
            ->with(\Mockery::any())
//            ->once()
            ->andReturn(\Mockery::spy(User::class));

        $userHandler = new UserHandler($userRepo);

        $this->assertEquals(get_class($userHandler->handle('Jan','Kowalski')), User::class);
    }
}