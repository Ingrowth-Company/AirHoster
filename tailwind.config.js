/** @type {import('tailwindcss').Config} */
module.exports = {
  // CONTENT: Caminhos ajustados para sua estrutura WordPress
  content: [
    "./*.{php,html,js,css}",
    "./template-parts/*.php",
    "./_src/css/*.css",
    "./_src/scss/*.scss",
  ],

  // THEME: Design system personalizado
  theme: {
    extend: {},
  },

  // PLUGINS úteis para WordPress
  plugins: [
    // Descomente se quiser usar:
    // require('@tailwindcss/forms'),
    // require('@tailwindcss/typography'),
  ],

  // SAFELIST: Classes importantes sempre incluídas
  safelist: ["bg-blue-400", "text-white", "p-4"],
};
