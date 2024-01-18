import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import tailwindTypewriter from 'tailwind-typewriter';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './index.html',
    './src/**/*.{vue,js,ts,jsx,tsx}',
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],

  theme: {
    extend: {
      backgroundPosition: {
        bottom: 'bottom',
        'bottom-4': 'center bottom 1rem',
        center: 'center',
        left: 'left',
        'left-bottom': 'left bottom',
        'left-top': 'left top',
        right: 'right',
        'right-bottom': 'right bottom',
        'right-top': 'right top',
        'right-4': 'center right 1rem',
        top: 'top',
        'top-4': 'center top 1rem',
      },
      backgroundSize: {
        'full': '100% 100%',
      },
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
    },
  },

  plugins: [forms, tailwindTypewriter({
    wordsets: {
      titulo: {
        words: ['QUIMM'],
        delay: 1,
        caretColor: 'transparent',
        repeat: 0,
        eraseSpeed: 0,
      },
      titulo2: {
        words: ['ICA'],
        delay: 3,
        caretColor: 'lime',
        repeat: 0,
        eraseSpeed: 0,
        caretWidth: '5px',

      },
      text1: {
        words: ['Une las formulas con su respectiva imagen'],
        caretColor: 'lime',
        writeSpeed: 0.1,
        repeat: 0,
        eraseSpeed: 0,
        caretWidth: '5px',

      },
    },
  })],
};
