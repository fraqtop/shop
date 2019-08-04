<?php


class ShowCategoriesCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    public function tryToGetUnauthorizedTest(ApiTester $I)
    {
        $I->sendGet('/categories');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::UNAUTHORIZED);
    }

    public function tryToGetAuthorizedTest(ApiTester $I)
    {
        $I->sendPOST('/users/login', [
            'username' => 'demo',
            'password' => 'demo'
        ]);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $token = $I->grabDataFromResponseByJsonPath('$.access_token');
        $I->amBearerAuthenticated($token[0]);
        $I->sendGET('/categories');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
