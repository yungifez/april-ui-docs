/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'selector',
    presets: [
        require('./vendor/yungifez/april-ui/tailwind.config.js'),
    ],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.blade.md",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/yungifez/april-ui/resources/**/*.php'
    ],
    safelist: [
        'shiki',
        'highlight',
        'focus'
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}

