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

    public function testCarouselBlockIsVisible(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->seeElement('.carousel-block');
        $I->see('Werk', '.carousel-block__title');
        $I->seeElement('.more-work-link-bg');
        $I->seeElement('.more-work-link');
        $I->see('meer werk', '.more-work-link');
        $I->seeElement('swiper-container.mySwiper');
        $I->seeElement('.project-card');
        $I->seeElement('.project-card__image');
        $I->seeElement('.project-card__overlay');
        $I->seeElement('.project-card__content');
        $I->seeElement('.project-card__title');
    }

    public function testCarouselMoreWorkLink(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->seeLink('meer werk', '/projecten');
    }

    public function testCarouselSwiperJsLoaded(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->seeInSource('swiper');
        $I->seeInSource('swiper-container');
    }

    public function testFooterElements(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->seeFooterElements();
    }
}
