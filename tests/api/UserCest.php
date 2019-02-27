<?php namespace App\Tests;
use App\Tests\ApiTester;
use Codeception\Util\HttpCode;

class UserCest
{
    /**
     * @param \App\Tests\ApiTester $I
     */
    public function testWhenSendIdShowUser(ApiTester $I)
    {
        $I->sendGET('http://servermail.local:9880/user/4');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
    }

    public function testTakeAllUsers(ApiTester $I)
    {
        $I->sendGET('http://servermail.local:9880/user');
        $I->seeResponseCodeIs(HttpCode::OK);
//        $I->seeResponseJsonMatchesJsonPath('$.usr_id');
//        $I->seeResponseJsonMatchesJsonPath('$.name');
//        $I->seeResponseMatchesJsonType([
//           'usr_id' => 'int',
//            'name' => 'string'
//        ]);
        $I->seeResponseIsJson();
    }

    public function testWhenSendIdDeleteUser(ApiTester $I)
    {
        $I->sendDELETE('http://servermail.local:9880/user',[
            'id' => 4
        ]);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
    }

    public function testWhenSendIdAddUser(ApiTester $I)
    {
        $I->sendPOST('http://servermail.local:9880/user',[
            'first_name' => 'test',
            'last_name' => 'test',
        ]);
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
    }

    public function testWhenSendRequestUpdateUser(ApiTester $I)
    {
        $I->sendPUT('http://servermail.local:9880/user',[
            'id' => 8,
            'first_name' => 'test',
            'last_name' => 'test',
        ]);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
    }

}
