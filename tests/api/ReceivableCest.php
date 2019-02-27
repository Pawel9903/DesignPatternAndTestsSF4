<?php namespace App\Tests;
use App\Tests\ApiTester;
use Codeception\Util\HttpCode;

class ReceivableCest
{
    /**
     * @param \App\Tests\ApiTester $I
     */
    public function testWhenSendIdShowReceivable(ApiTester $I)
    {
        $I->sendGET('http://servermail.local:9880/receivable/1');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();

    }

    public function testTakeAllReceivables(ApiTester $I)
    {
        $I->sendGET('http://servermail.local:9880/receivables');
        $I->seeResponseIsJson();
    }

    public function testWhenSendIdDeleteReceivable(ApiTester $I)
    {
        $I->sendPOST('http://servermail.local:9880/receivable/delete',[
            'id' => 1
        ]);
        $I->seeResponseCodeIs(HttpCode::OK);

        $I->seeResponseIsJson();
    }

    public function testWhenSendIdAddReceivable(ApiTester $I)
    {
        $I->sendPOST('http://servermail.local:9880/receivable/add',[
            'id' => 2
        ]);
        $I->seeResponseCodeIs(HttpCode::OK);

        $I->seeResponseIsJson();
    }

    public function testWhenSendRequestUpdateReceivable(ApiTester $I)
    {
        $I->sendPUT('http://servermail.local:9880/receivable/update',[
            'id' => 1,
        ]);
        $I->seeResponseCodeIs(HttpCode::OK);

        $I->seeResponseIsJson();
    }
}
