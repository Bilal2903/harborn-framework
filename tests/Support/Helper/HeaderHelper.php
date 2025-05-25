<?php
namespace Tests\Support;

use Codeception\Module;

class HeaderHelper extends Module
{
    /**
     * Checks for the presence of header elements on the page.
     */
    public function seeHeaderElements($I): void
    {
        $I->seeElement('header.banner');
        $I->seeElement('a.logo');
        $I->seeElement('a.logo img');
        $I->seeElement('nav.nav-primary');
        $I->seeElement('.nav-primary__list');
        $I->seeElement('.search-bar form');
        $I->seeElement('.language-switcher');
        $I->seeElement('.language-switcher__list');
        $I->seeElement('.language-switcher__item--current');
    }
}
