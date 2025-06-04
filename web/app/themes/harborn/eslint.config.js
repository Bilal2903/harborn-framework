import globals from 'globals';
import eslint from '@eslint/js';
import { FlatCompat } from '@eslint/eslintrc';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
import { defineConfig, globalIgnores } from 'eslint/config';

const __filename = fileURLToPath( import.meta.url );
const __dirname  = path.dirname( __filename );
const compat     = new FlatCompat( { baseDirectory: __dirname } );

export default defineConfig(
	[
	globalIgnores(
		[
		'node_modules/',
		'dist/',
		'build/',
		'resources/assets/build/',
		'public/',
		'public/build/',
		'vendor/',
		'test-results/',
		'web/app/cache/',
		'web/app/plugins/',
		'*.xml',
		'*.css',
		'*.json',
		'*.png',
		]
	),

	eslint.configs.recommended,

	...compat.extends( 'plugin:@wordpress/recommended' ),
	...compat.extends( 'prettier' ),

	{
		languageOptions: {
			ecmaVersion: 2022,
			sourceType: 'module',
			globals: {
				...globals.browser,
				...globals.node,
				wp: 'readonly',
				jQuery: 'readonly',
			},
			parserOptions: {
				ecmaFeatures: {
					jsx: true,
				},
			},
		},
	},

	{
		files: ['**/*.js', '**/*.mjs', '**/*.cjs', '**/*.jsx'],
		rules: {
			semi: ['error', 'always'],
			quotes: ['error', 'single'],
			'no-unused-vars': ['warn', { argsIgnorePattern: '^_' }],
			'no-console': 'warn',
			indent: ['error', 2],
			'@wordpress/no-unused-vars-before-return': 'off',
		},
	},

	{
		files: ['vite.config.js', 'postcss.config.cjs', 'tailwind.config.cjs'],
		languageOptions: {
			globals: {
				...globals.node,
			},
		},
		rules: {
			'no-console': 'off',
			'no-unused-vars': 'off',
		},
	},

	{
		files: ['vite.config.js'],
		rules: {
			'import/no-unresolved': 'off',
		},
	},

	{
		files: ['eslint.config.js'],
		rules: {
			'import/no-unresolved': 'off',
		},
	},
	]
);
