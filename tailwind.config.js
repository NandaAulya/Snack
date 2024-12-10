import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            fontFamily: {
                sans: ["InterVariable", ...defaultTheme.fontFamily.sans],
            },

            colors: {
                text: "#e3d5f7", //putih
                background: "#06020b", //hitam
                primary: "#b68feb", //lilac
                secondary: "#88197b", //purple
                accent: "#dc3fa7", //pink

                text1: "#f1ddf9",
                background1: "#190620",
                primary1: "#cf91eb",
                secondary1: "#83182a",
                accent1: "#de6c50",
            },
        },
    },
    plugins: [],
};
