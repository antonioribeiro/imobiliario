<?php 

$I = new FunctionalTester($scenario);

$I->am('a Imobiliario member');

$I->setBrowserEnvironmentToTesting();

$I->wantTo('Review all users who are registered for Imobiliar.io');

$I->amOnPage('/users');

$I->see('Antonio Carlos');

