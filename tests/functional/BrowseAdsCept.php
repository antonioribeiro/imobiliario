<?php

$I = new FunctionalTester($scenario);

$I->am('a visitor');

$I->wantTo('browse the ads page');

/// fail --- go to login

$I->amOnPage('/realties');

$I->seeElement('.ad[data-id="1"]');

$I->click('.ad[data-id="1"] .ad-delete');

$I->waitForJs("return $('input[value=\"Sign In\"]').is(':visible');", 10);

$I->seeCurrentUrlEquals('/login');

/// success

$I->signIn();

$I->amOnPage('/realties');

$I->seeElement('.ad');

$I->click('.ad[data-id="1"] .ad-delete');

$I->waitForJs("return $('.ad[data-id=\"1\"]').is(':hidden');", 10);

$I->dontSeeElement('.ad[data-id="1"] .ad-delete');

$I->reloadPage();

$I->dontSeeElement('.ad[data-id="1"] .ad-delete');
