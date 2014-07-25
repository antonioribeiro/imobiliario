<?php 

$I = new FunctionalTester($scenario);

$I->am('a Imobiliario member');

$I->wantTo('Review all users who are registered for Imobiliar.io');

$I->signIn();

$I->amOnPage('/users');

$I->see('John Doe');
