import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                paper: '#f2f0eb',
                'paper-2': '#e9e5dd',
                'brown-lead': '#4a4436',
                'brown-deep': '#302c24',
                ink: '#24211d',
                lead: '#564e42',
                muted: '#777166',
                line: 'rgba(36, 33, 29, 0.14)',
                accent: {
                    DEFAULT: '#b55b48',
                    hover: '#9c4c3b',
                    light: '#f5ecea',
                    border: 'rgba(181, 91, 72, 0.25)',
                },
            },
            fontFamily: {
                display: ['"Cormorant Garamond"', 'Georgia', 'serif'],
                sans: ['Inter', '"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
