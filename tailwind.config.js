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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                'silver-editorial': ['The Silver Editorial', 'serif'],
                'old-fashion': ['Old Fashion Script Ltd', 'cursive'],
            },
            colors: {
                'gabbitot-blue': '#0052CC',
                'cream': '#F5F1ED',
            },
            backgroundImage: {
                'linen-texture': "url('data:image/svg+xml,%3Csvg width=%22100%22 height=%22100%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noise%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.9%22 numOctaves=%224%22 result=%22noise%22 /%3E%3CfeColorMatrix in=%22noise%22 type=%22saturate%22 values=%220.3%22 /%3E%3C/filter%3E%3Crect width=%22100%22 height=%22100%22 fill=%22%23F5F1ED%22 /%3E%3Crect width=%22100%22 height=%22100%22 fill=%22%23FFFFFF%22 opacity=%220.05%22 filter=%22url(%23noise)%22 /%3E%3C/svg%3E')",
            },
        },
    },

    plugins: [forms],
};
