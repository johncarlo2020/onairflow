const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                'sm': '640px',
                'md': '768px',
                'lg': '1024px',
                'xl': '1024px',
                '2xl': '1140px',
              },
              container: {
                padding: {
                  DEFAULT: '1rem',
                  sm: '0rem',
                  lg: '6rem',
                  xl: '7rem',
                },
                center: true,
              },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
