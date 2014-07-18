<?php 

$I = new FunctionalTester($scenario);

$I->am('a Imobiliario member.');

$I->wantTo('Want to post statuses to my profile.');

$I->signIn();

$I->amOnPage('/statuses');

$I->postAStatus('My first post!');

$I->seeRecord('statuses', [
	'body' => 'My first post!',
]);

$I->seeCurrentUrlEquals('/statuses');

// dd(Log::info(serialize(DB::table('statuses')->get())));

$I->see('My first post!');

//file_put_contents('/tmp/log.txt', (string) DB::table('statuses')->get(), FILE_APPEND | LOCK_EX);
