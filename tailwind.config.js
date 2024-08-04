/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        gray: '#888888',
        'light-gray': '#e9e9e9',
        'medium-gray': '#cecece',
        'white': '#ffffff',
        'black': '#000000',
        'dark-gray': '#cdcdcd',
        'dark-blue': '#040e1e',
        'dark-black': '#000000',
        'yellow': '#fcc409',
        'blue': '#061c45',
        'lightest-gray': '#f0f0f0',
        'medium-blue': '#08265c',
      },
      fontFamily: {
        worksans: ['Work Sans', 'sans-serif'],
      },
    },
  },
  plugins: [],
};
