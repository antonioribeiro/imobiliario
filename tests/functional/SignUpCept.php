<?php

$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('Sign up for a imobiliario.io account');

$I->deleteAllUsers();

$I->amOnPage('/');
$I->click('Sign Up!');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Name:', 'Antonio Carlos');
$I->fillField('Email:', 'acr@imobiliar.io');
$I->fillField('Username:', 'antonioribeiro');
$I->fillField('Password:', 'secret');
$I->fillField('Password Confirmation:', 'secret');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/');
$I->see('Welcome to Imobiliar.io');
$I->see('Glad to have you as');
$I->see('Antonio Carlos');

$I->seeRecord('users', [
	'email' => 'acr@imobiliar.io',
	'first_name' => 'Antonio Carlos'
]);

$I->dontSee('Sign Up');
