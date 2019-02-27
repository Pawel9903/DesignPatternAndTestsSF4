<?php namespace App\Tests;
use App\Tests\ApiTester;
use Codeception\Util\HttpCode;

class PaymentCest
{
    /**
     * @param \App\Tests\ApiTester $I
     */
    public function testWhenSendIdShowPayment(ApiTester $I)
    {
        $I->sendGET('http://servermail.local:9880/payment/1');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
    }

    public function testTakeAllPayments(ApiTester $I)
    {
        $I->sendGET('http://servermail.local:9880/payment');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
    }

    public function testWhenSendIdDeletePayment(ApiTester $I)
    {
        $I->sendDELETE('http://servermail.local:9880/payment',[
            'id' => 1
        ]);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
    }

    public function testWhenSendIdAddPayment(ApiTester $I)
    {
        $I->sendPOST('http://servermail.local:9880/payment',[
            'usr_id' => 5,
            'pty_id' => 1,
            'total_net' => 100,
            'total_gross' => 100
        ]);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
    }

    public function testWhenSendRequestUpdatePayment(ApiTester $I)
    {
        $I->sendPUT('http://servermail.local:9880/payment',[
            'id' => 1,
            'usr_id' => 5,
            'pty_id' => 1,
            'total_net' => 100,
            'total_gross' => 100
        ]);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
    }
}
