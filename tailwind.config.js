import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/**/*.blade.php',
        './resources/view/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Bebas Neue', ...defaultTheme.fontFamily.sans],
                funny: [ "Merienda", "cursive"],
                funny2: ['Amatic SC'],
                robo: ["Roboto"]
            },
        },
    },
    plugins: [],
    presets: [
        require('./vendor/yungifez/artisan-ui/tailwind.config.js'),
      ]
};
