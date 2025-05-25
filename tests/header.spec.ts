import { test, expect } from '@playwright/test';

test('Header is visible and contains logo, nav, and language switcher', async ({ page }) => {
  // Change this to your local dev URL if needed
  await page.goto('http://harborn-framework.local.harborn.com/');

  // Check header exists
  const header = page.locator('header.banner');
  await expect(header).toBeVisible();

  // Check logo
  await expect(header.locator('.logo img')).toBeVisible();

  // Check navigation menu
  await expect(header.locator('.nav-primary')).toBeVisible();

  // Check language switcher
  await expect(header.locator('.language-switcher')).toBeVisible();

  // Optionally: check language dropdown appears on hover
  await header.locator('.language-switcher__item--current').hover();
  await expect(header.locator('.language-switcher__dropdown')).toBeVisible();
});
