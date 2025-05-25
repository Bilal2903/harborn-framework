<?php

declare(strict_types=1);

namespace Tests\Acceptance\Home;

use Tests\Support\AcceptanceTester;

final class HomePageCest
{
    public function testHeaderElements(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->seeHeaderElements();
    }

    public function tryToSeeHeroSection(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->seeElement('.hero-block');
        $I->seeElement('.hero-block__heading');
        $I->seeElement('.hero-block__subheading');
        $I->seeElement('.hero-block__button');
    }

    public function testFooterElements(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->seeFooterElements();
    }
}
