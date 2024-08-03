/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: "2rem",
            screens: {
                "2xl": "1400px",
            },
        },
        extend: {
            colors: {
                primary: "#2f2d2d",
                secondary: "#525252",
                test: "#D9D9D9",
                darkwhite: "#F2F2F2",
            },
        },
    },
    plugins: [],
};
