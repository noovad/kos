import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                white: "#fff",
                blue: "#304E6E",
                bluebg: "#ACB8C5",
                black: "#000",
                grey: "#808080",
            },
            dropShadow: {
                up: "0 -5px 20px rgba(0, 0, 0, 0.3)",
                down: "0 5px 20px rgba(0, 0, 0, 0.3)",
            },
            borderRadius: {
                large: "40px",
            },
        },
    },
    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#570df8",
                    "primary-focus": "#4506cb",
                    "primary-content": "#ffffff",
                    secondary: "#f000b8",
                    "secondary-focus": "#bd0091",
                    "secondary-content": "#ffffff",
                    accent: "#37cdbe",
                    "accent-focus": "#2aa79b",
                    "accent-content": "#ffffff",
                    neutral: "#3d4451",
                    "neutral-focus": "#2a2e37",
                    "neutral-content": "#ffffff",
                    "base-100": "#ffffff",
                    "base-200": "#f9fafb",
                    "base-300": "#d1d5db",
                    "base-content": "#1f2937",
                    info: "#2094f3",
                    success: "#009485",
                    warning: "#ff9900",
                    error: "#ff5724",
                },
            },
        ],
    },

    plugins: [forms, require("daisyui")],
};
