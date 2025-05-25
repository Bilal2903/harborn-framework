<?php
namespace Tests\Support\Helper;

use Codeception\Module;

class HeroHelper extends Module
{
    /**
     * Checks for the presence of hero section elements on the page.
     */
    public function tryToSeeHeroSection($I): void
    {
        $I->seeElement('.hero-block');
        $I->seeElement('.hero-block__heading');
        $I->seeElement('.hero-block__subheading');
        $I->seeElement('.hero-block__button');
    }
}
