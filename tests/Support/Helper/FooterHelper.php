<?php
namespace Tests\Support\Helper;

use Codeception\Module;

class FooterHelper extends Module
{
    /**
     * Checks for the presence of footer elements on the page.
     */
    public function seeFooterElements($I): void
    {
        $I->seeElement('footer.site-footer');
        $I->seeElement('.footer-nav');
        $I->seeElement('.footer-copyright');
    }
}
