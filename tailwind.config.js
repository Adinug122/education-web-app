import defaultTheme from 'tailwindcss/defaultTheme'
import colors from 'tailwindcss/colors'
import forms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
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

  plugins: [forms],
}
