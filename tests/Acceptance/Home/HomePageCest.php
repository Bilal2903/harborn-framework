<?php

declare(strict_types=1);

namespace Tests\Acceptance\Home;

use Tests\Support\AcceptanceTester;
use Tests\Support\HeaderHelper;
use Tests\Support\Helper\FooterHelper;

final class HomePageCest
{
    public function testHeaderElements(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $headerHelper = new HeaderHelper();
        $headerHelper->seeHeaderElements($I);
    }

    public function tryToSeeHeroSection(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $heroHelper = new HeroHelper();
        $heroHelper->tryToSeeHeroSection($I);
    }

    public function testFooterElements(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $footerHelper = new FooterHelper();
        $footerHelper->seeFooterElements($I);
    }
}
