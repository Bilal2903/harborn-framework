# Test info

- Name: Header is visible and contains logo, nav, and language switcher
- Location: /Users/bilal/dev/harborn-framework/tests/header.spec.ts:3:5

# Error details

```
Error: Timed out 5000ms waiting for expect(locator).toBeVisible()

Locator: locator('header.banner').locator('.language-switcher__dropdown')
Expected: visible
Received: <element(s) not found>
Call log:
  - expect.toBeVisible with timeout 5000ms
  - waiting for locator('header.banner').locator('.language-switcher__dropdown')

    at /Users/bilal/dev/harborn-framework/tests/header.spec.ts:22:64
```

# Page snapshot

```yaml
- banner:
  - link "Harborn logo":
    - /url: http://harborn-framework.local.harborn.com/
    - img "Harborn logo"
  - navigation "Menu 1":
    - list:
      - listitem:
        - link "Home":
          - /url: http://harborn-framework.local.harborn.com/?page_id=63
      - listitem:
        - link "Insights":
          - /url: http://harborn-framework.local.harborn.com/?page_id=28
      - listitem:
        - link "About us":
          - /url: http://harborn-framework.local.harborn.com/?page_id=27
      - listitem:
        - link "Contact":
          - /url: http://harborn-framework.local.harborn.com/?page_id=23
  - search:
    - text: "Zoeken naar:"
    - searchbox "Zoeken naar:"
    - button "Zoeken": Zoeken 🔍
  - list:
    - listitem:
      - link "NL":
        - /url: "#"
- main:
  - article:
    - heading "Hello world!" [level=2]:
      - link "Hello world!":
        - /url: http://harborn-framework.local.harborn.com/?p=1
    - time: mei 15, 2025
    - paragraph:
      - text: By
      - link "Bilal.hussain":
        - /url: http://harborn-framework.local.harborn.com/?author=1
    - paragraph: Welcome to WordPress. This is your first post. Edit or delete it, then start writing!
- complementary:
  - heading "Recent Posts" [level=1]
  - search:
    - text: Search
    - searchbox "Search"
    - button "Search"
  - search:
    - text: Zoeken
    - searchbox "Zoeken"
    - button "Zoeken":
      - img
  - heading "Recent Comments" [level=2]
  - list:
    - listitem:
      - article:
        - link "A WordPress Commenter":
          - /url: https://wordpress.org/
        - text: op
        - link "Hello world!":
          - /url: http://harborn-framework.local.harborn.com/?p=1#comment-1
- contentinfo:
  - navigation:
    - list:
      - listitem:
        - link "Cookies":
          - /url: https://www.harborn.com/en/cookies
      - listitem:
        - link "Terms & Conditions":
          - /url: https://www.harborn.com/en/terms-agreements
      - listitem:
        - link "Privacy statement":
          - /url: https://www.harborn.com/en/privacy-statement
      - listitem:
        - link "Support":
          - /url: https://harborn.atlassian.net/servicedesk/customer/portals
  - list:
    - listitem:
      - link "Instagram":
        - /url: https://www.instagram.com/harborn.digital/?utm_source=ig_web_button_share_sheet
        - img
    - listitem:
      - link "LinkedIn":
        - /url: https://nl.linkedin.com/company/harborn
        - img
    - listitem:
      - link "YouTube":
        - /url: http://www.youtube.com/@harborn.digital
        - img
```

# Test source

```ts
   1 | import { test, expect } from '@playwright/test';
   2 |
   3 | test('Header is visible and contains logo, nav, and language switcher', async ({ page }) => {
   4 |   // Change this to your local dev URL if needed
   5 |   await page.goto('http://harborn-framework.local.harborn.com/');
   6 |
   7 |   // Check header exists
   8 |   const header = page.locator('header.banner');
   9 |   await expect(header).toBeVisible();
  10 |
  11 |   // Check logo
  12 |   await expect(header.locator('.logo img')).toBeVisible();
  13 |
  14 |   // Check navigation menu
  15 |   await expect(header.locator('.nav-primary')).toBeVisible();
  16 |
  17 |   // Check language switcher
  18 |   await expect(header.locator('.language-switcher')).toBeVisible();
  19 |
  20 |   // Optionally: check language dropdown appears on hover
  21 |   await header.locator('.language-switcher__item--current').hover();
> 22 |   await expect(header.locator('.language-switcher__dropdown')).toBeVisible();
     |                                                                ^ Error: Timed out 5000ms waiting for expect(locator).toBeVisible()
  23 | });
  24 |
```