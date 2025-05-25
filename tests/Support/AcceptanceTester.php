<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */

    /**
     * Checks for the presence of header elements on the page.
     */
    public function seeHeaderElements(): void
    {
        $this->seeElement('header.banner');
        $this->seeElement('a.logo');
        $this->seeElement('a.logo img');
        $this->seeElement('nav.nav-primary');
        $this->seeElement('.nav-primary__list');
        $this->seeElement('.search-bar form');
        $this->seeElement('.language-switcher');
        $this->seeElement('.language-switcher__list');
        $this->seeElement('.language-switcher__item--current');
    }

    /**
     * Checks for the presence of footer elements on the page.
     */
    public function seeFooterElements(): void
    {
        $this->seeElement('footer.footer');
        $this->seeElement('.footer__nav');
        $this->seeElement('.footer-nav');
        $this->seeElement('.footer__social');
        // Add more footer checks as needed
    }
}
