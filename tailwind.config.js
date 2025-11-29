import defaultTheme from 'tailwindcss/defaultTheme';
import colors from 'tailwindcss/colors'; 

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
            },
            colors: {
                // UPDATE DISINI: Ganti jadi 'colors.blue' agar sesuai logo
                brand: colors.blue, 
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};