<?php

$I = new FunctionalTester($scenario);

$I->am('an Imobiliario member');

$I->wantTo('view my profile');

$I->signIn();

$I->postAStatus('My new status.');

$I->click('Profile');

$I->seeCurrentUrlEquals('/@johndoe');

$I->see('My new status.');
