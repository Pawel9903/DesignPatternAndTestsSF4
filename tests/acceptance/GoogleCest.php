<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class GoogleCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function testSearchInGoogleSprint(AcceptanceTester $I)
    {
        $I->amOnPage('https://www.google.pl/');
        $I->see('Google');
        $I->fillField('q', 'sprint');
        $I->click('center input[name="btnG"]');
    }
}
