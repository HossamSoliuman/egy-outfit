/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#3490dc',
        secondary: '#ffed4a',
        accent: '#e3342f',
        neutral: '#EEEEEE',
        'brand-blue': '#201E43',
        'brand-light-blue': '#134B70',
        'brand-dark-blue': '#508C9B',
        'brand-green': '#10b981',
        'brand-red': '#ef4444',
        'brand-yellow': '#f59e0b',
        'brand-gray': '#6b7280',
        'brand-dark-gray': '#374151',
        'brand-light-gray': '#d1d5db',
      },
    },
  },
  plugins: [],
};
