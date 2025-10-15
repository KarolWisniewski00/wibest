import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                cello: {
                    '50': '#f3f6fc',
                    '100': '#e5edf9',
                    '200': '#c6d9f1',
                    '300': '#93bae6',
                    '400': '#5a97d6',
                    '500': '#357ac2',
                    '600': '#255fa4',
                    '700': '#1f4c85',
                    '800': '#1d416f',
                    '900': '#1e3a5f',
                    '950': '#13243e',
                },
            },
        },
    },

    plugins: [forms, typography],
};
