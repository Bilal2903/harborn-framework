export function initStickyHeader(stickyHeader, mainHeader) {
	if ( ! mainHeader || ! stickyHeader) {
		return;
	}

	function checkStickyHeader() {
		const headerRect = mainHeader.getBoundingClientRect();
		if (headerRect.bottom <= 0) {
			stickyHeader.classList.add( 'is-visible' );
		} else {
			stickyHeader.classList.remove( 'is-visible' );
		}
	}

	// Initial call
	checkStickyHeader();

	return checkStickyHeader;
}
