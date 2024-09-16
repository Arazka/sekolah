/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            screens: {
                xs: "360px",
                xss: "450px",
                sm: "640px",
                md: "930px",
                lg: "1024px",
                xl: "1280px",
                xxl: "1680px",
            },
            maxWidth: {
                maxWidth500: "500px",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
