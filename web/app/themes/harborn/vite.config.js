import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(
	{
		base: '/app/themes/harborn/public/build/',
		plugins: [
		laravel(
			{
				input: [
				'resources/css/app.scss',
				'resources/js/app.js',
				'resources/css/editor.css',
				'resources/js/editor.js',
				],
				refresh: true,
			}
		),
	],
	resolve: {
		alias: {
			'@scripts': '/resources/js',
			'@styles': '/resources/css',
			'@fonts': '/resources/fonts',
			'@images': '/resources/images',
		},
		},

		server: {
			cors: true,
		},
	}
);
