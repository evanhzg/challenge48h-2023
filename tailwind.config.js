const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['unit', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'customGray': '#393E41',
            'customBlue': '#1602FD',
            'customRed': '#FD0202',
            'customGreen': '#02fd06',
            'customOrange': '#fd7302',
        }
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin')
    ],
};
