import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
export default {
    presets: [
        require("./vendor/wireui/wireui/tailwind.config.js")
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
    ],
    darkMode: 'media', // lub 'media'
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    '50': '#f9fafb',
                    '100': '#f3f4f6',
                    '200': '#e5e7eb',
                    '300': '#d1d5db',
                    '400': '#9ca3af',
                    '500': '#6b7280',
                    '600': '#4b5563',
                    '700': '#374151',
                    '800': '#1f2937',
                    '900': '#111827',
                    '950': '#030712',
                },
                secondary: {
                    '50': '#f9fafb',
                    '100': '#f3f4f6',
                    '200': '#e5e7eb',
                    '300': '#d1d5db',
                    '400': '#ffffff',
                    '500': '#6b7280',
                    '600': '#4b5563',
                    '700': '#4b5563',
                    '800': '#374151',
                    '900': '#111827',
                    '950': '#030712',
                },
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
