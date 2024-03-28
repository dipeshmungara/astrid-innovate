// tailwind.config.js

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./template-parts/*.{php,html,js}","./*.{php,html,js}"],
  theme: {
    extend: {
      colors: {
        at: {
          blue: '#4d44b5',
        },
        transparent: 'transparent',
        white: '#FFFFFF',
        'logo-1': '#feba00',
        'logo-2' : '#071e3b',
      },
      // Define custom gradient colors
      gradientColors: {
        'cyan-blue': ['rgba(66, 153, 225, 1)', 'rgba(92, 133, 252, 1)'],
      },
      // Extend background gradient utility use : bg-gradient-cyan-blue
      backgroundImage: theme => ({
        'gradient-cyan-blue': 'linear-gradient(to right, ' + theme('gradientColors.cyan-blue') + ')',
      }),
    },
  },
  plugins: [],
}