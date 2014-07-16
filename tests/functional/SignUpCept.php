<?php

$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for a imobiliario.io account');

$I->amOnPage('/');
$I->click('Sign Up!');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Name:', 'Antonio Carlos');
$I->fillField('Email:', 'acr@imobiliar.io');
$I->fillField('Password:', 'secret');
$I->fillField('Password Confirmation:', 'secret');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('');
$I->see('Welcome to Imobiliar.io');
$I->see('Glad to have you as');
$I->dontSee('Sign Up');

$I->seeRecord('users', [
	'email' => 'acr@imobiliar.io',
	'first_name' => 'Antonio Carlos'
]);

$I->assertTrue(Auth::check());
