<?php 

$I = new FunctionalTester($scenario);

$I->am('a Imobiliario member');

$I->wantTo('login to my imobiliario account');

$I->signIn();

$I->seeInCurrentUrl('/statuses');

$I->see('Welcome back!');

// Go to a page which's not supposed to have a user name, unless it is logged in

$I->amOnPage('/login');

$I->see('John Doe');
