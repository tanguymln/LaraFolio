import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, require("daisyui")],
    daisyui: {
        themes: [
            {
                light: {
                    primary: "#3490dc", // Exemple de couleur pour le bouton
                    secondary: "#ffed4a",
                    accent: "#38b2ac",
                    neutral: "#f7fafc", // Couleur de fond claire
                    "base-100": "#ffffff", // Couleur du fond du menu, etc.
                    "base-content": "#000000", // Couleur du texte en mode clair
                },
                dark: {
                    primary: "#38b2ac", // Exemple de couleur pour le bouton
                    secondary: "#ffed4a",
                    accent: "#3490dc",
                    neutral: "#2d3748", // Couleur de fond sombre
                    "base-100": "#1a202c", // Couleur du fond du menu, etc.
                    "base-content": "#ffffff", // Couleur du texte en mode sombre
                },
            },
        ],
    },
};
