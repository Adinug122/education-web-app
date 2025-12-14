import defaultTheme from 'tailwindcss/defaultTheme'
import colors from 'tailwindcss/colors'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/views/**/*.php',
    './resources/views/components/**/*.blade.php',
    './app/View/Components/**/*.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        brand: colors.blue,
      },
    },
  },

  plugins: [require('@tailwindcss/forms')],
}
