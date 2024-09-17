const defaultTheme = require("tailwindcss/defaultTheme");
import preset from "./vendor/filament/support/tailwind.config.preset";

module.exports = {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
        "./vendor/awcodes/filament-table-repeater/resources/**/*.blade.php",
        "./vendor/bezhansalleh/filament-language-switch/resources/views/language-switch.blade.php",
        "./vendor/statikbe/laravel-filament-chained-translation-manager/**/*.blade.php",
    ],
    theme: {
        extend: {},
    },

    plugins: [require("@tailwindcss/forms")],
};
