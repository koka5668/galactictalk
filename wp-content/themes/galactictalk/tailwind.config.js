/**
 * @type {import('tailwindcss/tailwind-config').TailwindConfig }
 */
module.exports = {
  future: {
    hoverOnlyWhenSupported: true,
  },
  content: ['./**/*.{php,html}', './src/**/*.{js,ts}'],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/container-queries'),
    require('fluid-tailwind'),
  ],
};
