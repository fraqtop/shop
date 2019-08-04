<?php
namespace services;

use app\services\UserService;

class AuthenticatorTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var UserService
     */
    private $users;
    
    protected function _before()
    {
        $this->users = new UserService();
    }

    protected function _after()
    {
    }

    public function testBadAuth()
    {
        $this->assertFalse($this->users->authenticate('test', 'test'));
    }
}