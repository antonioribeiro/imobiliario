<?php

$I = new FunctionalTester($scenario);

$I->am('an Imobiliario member');

$I->wantTo('view my profile');

$I->amOnPage('/statuses');

$I->postAStatus('My first post!');

$I->seeRecord('statuses', [
	'body' => 'My first post!',
]);

$I->seeCurrentUrlEquals('/statuses');

// dd(Log::info(serialize(DB::table('statuses')->get())));

$I->see('My first post!');

//file_put_contents('/tmp/log.txt', (string) DB::table('statuses')->get(), FILE_APPEND | LOCK_EX);
