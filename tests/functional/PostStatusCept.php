<?php 

$I = new FunctionalTester($scenario);

$I->am('a Imobiliario member.');

$I->wantTo('Want to post statuses to my profile.');

$I->signIn();

$I->amOnPage('/statuses');

$I->postAStatus('My first post!');

$I->seeCurrentUrlEquals('/statuses');

$I->see('My first post!');

