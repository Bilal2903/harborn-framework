<?php

declare(strict_types=1);

namespace Tests\Acceptance\Home;

use Tests\Support\AcceptanceTester;
use PHPUnit\Framework\Assert;

final class HomePageCest {

	public function testHeaderElements( AcceptanceTester $I ): void {
		$I->amOnPage( '/' );
		$I->seeHeaderElements();
	}

	public function tryToSeeHeroSection( AcceptanceTester $I ): void {
		$I->amOnPage( '/' );
		$I->seeElement( '.hero-block' );
		$I->seeElement( '.hero-block__heading' );
		$I->seeElement( '.hero-block__subheading' );
		$I->seeElement( '.hero-block__button' );
	}

	public function testCarouselBlockIsVisible( AcceptanceTester $I ): void {
		$I->amOnPage( '/' );
		$I->seeElement( '.carousel-block' );
		$I->see( 'Werk', '.carousel-block__title' );
		$I->seeElement( '.more-work-link-bg' );
		$I->seeElement( '.more-work-link' );
		$I->see( 'meer werk', '.more-work-link' );
		$I->seeElement( 'swiper-container.mySwiper' );
		$I->seeElement( '.project-card' );
		$I->seeElement( '.project-card__image' );
		$I->seeElement( '.project-card__overlay' );
		$I->seeElement( '.project-card__content' );
		$I->seeElement( '.project-card__title' );
	}

	public function testCarouselMoreWorkLink( AcceptanceTester $I ): void {
		$I->amOnPage( '/' );
		$I->seeLink( 'meer werk', '/projecten' );
	}

	public function testCarouselSwiperJsLoaded( AcceptanceTester $I ): void {
		$I->amOnPage( '/' );
		$I->seeInSource( 'swiper' );
		$I->seeInSource( 'swiper-container' );
	}

	public function testFooterElements( AcceptanceTester $I ): void {
		$I->amOnPage( '/' );
		$I->seeFooterElements();
	}

	/**
	 * Test the visibility and functionality of the sticky header on scroll.
	 */
	public function testStickyHeaderVisibility( AcceptanceTester $I ): void {
		$I->amOnPage( '/' );
		$I->wait( 1.5 );
		$I->executeJS( 'window.scrollTo(0, 0);' );
		$I->wait( 0.5 );

		$I->dontSeeElement( '.sticky-header.is-visible' );
		$hamburgerDisplayStyle = $I->executeJS( "return window.getComputedStyle(document.querySelector('.hamburger-toggle')).display;" );
		Assert::assertStringContainsString( 'none', $hamburgerDisplayStyle, 'Hamburger display should be none initially.' );

		$I->executeJS( 'window.scrollTo(0, 200);' );
		$I->wait( 1.5 );

		$I->seeElement( '#stickyHeader' );
		$I->seeElement( '.sticky-header.is-visible' );
		$I->seeElement( '.sticky-header-content' );
		$I->seeElement( '.logo-sticky a' );
		$I->seeElement( '.sticky-header .search-bar' );
		$hamburgerDisplayStyle = $I->executeJS( "return window.getComputedStyle(document.querySelector('.hamburger-toggle')).display;" );
		Assert::assertStringContainsString( 'flex', $hamburgerDisplayStyle, 'Hamburger display should be flex when sticky.' );

		$I->executeJS( 'window.scrollTo(0, 0);' );
		$I->wait( 1.5 );

		$I->dontSeeElement( '.sticky-header.is-visible' );
		$hamburgerDisplayStyle = $I->executeJS( "return window.getComputedStyle(document.querySelector('.hamburger-toggle')).display;" );
		Assert::assertStringContainsString( 'none', $hamburgerDisplayStyle, 'Hamburger display should be none after scrolling up.' );
	}

	/**
	 * Test the opening and closing functionality of the mega menu.
	 */
	public function testMegaMenuToggle( AcceptanceTester $I ): void {
		$I->amOnPage( '/' );
		$I->wait( 1.5 );

		$I->executeJS( 'window.scrollTo(0, 0);' );
		$I->wait( 0.5 );

		$I->dontSeeElement( '.mega-menu-overlay.is-active' );
		$I->dontSeeInSource( 'mega-menu-open' );
		$I->dontSeeElement( '.hamburger-toggle.is-active' );

		$I->executeJS( 'window.scrollTo(0, 200);' );
		$I->wait( 1.5 );
		$hamburgerDisplayStyle = $I->executeJS( "return window.getComputedStyle(document.querySelector('.hamburger-toggle')).display;" );
		Assert::assertStringContainsString( 'flex', $hamburgerDisplayStyle, 'Hamburger display should be flex before clicking to open mega menu.' );

		$I->click( '.hamburger-toggle' );
		$I->wait( 1.5 );

		$I->seeElement( '#megaMenuOverlay' );
		$I->seeElement( '.mega-menu-overlay.is-active' );
		$I->seeElement( 'body.mega-menu-open' );
		$I->seeElement( '.hamburger-toggle.is-active' );
		$I->seeElement( '.mega-menu-content' );
		$I->see( 'Menu', '.mega-menu-heading-menu' );
		$I->see( 'Search', '.mega-menu-heading-menu' );
		$I->see( 'Socials', '.mega-menu-heading-menu' );
		$I->see( 'Taal', '.mega-menu-heading-menu' );
		$I->seeElement( '.mega-menu-nav' );
		$I->seeElement( '.mega-menu-search-bar' );
		$I->seeElement( '.mega-menu-socials-wrapper' );
		$I->seeElement( '.mega-menu-language-selector' );

		$I->click( '.mega-menu-close' );
		$I->wait( 1.5 );

		$I->dontSeeElement( '.mega-menu-overlay.is-active' );
		$I->dontSeeInSource( 'mega-menu-open' );
		$I->dontSeeElement( '.hamburger-toggle.is-active' );
	}

	/**
	 * Test that the mega menu navigation links are present and clickable.
	 */
	public function testMegaMenuNavigationLinks( AcceptanceTester $I ): void {
		$I->amOnPage( '/' );
		$I->wait( 1 );
		$I->executeJS( 'window.scrollTo(0, 200);' );
		$I->wait( 1.5 );
		$I->click( '.hamburger-toggle' );
		$I->wait( 1.5 );

		$I->seeElement( '.mega-nav-list' );
		$I->seeLink( 'Instagram', 'https://www.instagram.com/harborn.digital/?utm_source=ig_web_button_share_sheet' );
		$I->seeLink( 'LinkedIn', 'https://nl.linkedin.com/company/harborn' );
	}

	/**
	 * Test that the language switcher within the mega menu is functional.
	 */
	public function testMegaMenuLanguageSwitcher( AcceptanceTester $I ): void {
		$I->amOnPage( '/' );
		$I->wait( 1 );
		$I->executeJS( 'window.scrollTo(0, 200);' );
		$I->wait( 1.5 );
		$I->click( '.hamburger-toggle' );
		$I->wait( 1.5 );

		$I->seeElement( '.mega-menu-language-selector .language-switcher__list' );
		$I->see( 'EN', '.mega-menu-language-selector .language-switcher__link' );
		$I->see( 'NL', '.mega-menu-language-selector .language-switcher__link' );
	}
}
