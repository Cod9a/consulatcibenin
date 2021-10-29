const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  purge: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    colors,
    extend: {
        fontFamily: {
            sans: ['Mulish', ...defaultTheme.fontFamily['sans']],
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
