<?php 

$I = new FunctionalTester($scenario);

$I->am('a Imobiliario member');

$I->wantTo('login to my imobiliario account');

$I->signIn();

$I->seeInCurrentUrl('/statuses');

$I->see('Welcome back!');

$I->assertTrue(Auth::check());
