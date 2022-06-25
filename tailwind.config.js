const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require("tailwindcss");

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'gray-light': '#f5f6f9',
            },
            boxShadow: {
                'default': '0 35px 60px -15px rgba(0, 0, 0, 0.3)',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
