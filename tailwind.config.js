/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            handwriting: ['Snell Roundhand', 'cursive'],
        },
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#00990099',
                    50: '#52FF52',
                    100: '#3DFF3D',
                    200: '#14FF14',
                    300: '#00EB00',
                    400: '#00C200',
                    500: '#009900',
                    600: '#006100',
                    700: '#002900',
                    800: '#000000',
                    900: '#000000',
                    950: '#000000'
                },
                secondary: {
                    DEFAULT: '#007F7F',
                    50: '#38FFFF',
                    100: '#23FFFF',
                    200: '#00F9F9',
                    300: '#00D1D1',
                    400: '#00A8A8',
                    500: '#007F7F',
                    600: '#004747',
                    700: '#000F0F',
                    800: '#000000',
                    900: '#000000',
                    950: '#000000'
                },
                tertiary: {
                    DEFAULT: '#006699',
                    50: '#52C5FF',
                    100: '#3DBEFF',
                    200: '#14B1FF',
                    300: '#009CEB',
                    400: '#0081C2',
                    500: '#006699',
                    600: '#004161',
                    700: '#001B29',
                    800: '#000000',
                    900: '#000000',
                    950: '#000000'
                },
                quaternary: {
                    DEFAULT: '#338033',
                    50: '#96D596',
                    100: '#87CF87',
                    200: '#6AC46A',
                    300: '#4DB84D',
                    400: '#3F9D3F',
                    500: '#338033',
                    600: '#235823',
                    700: '#133013',
                    800: '#030803',
                    900: '#000000',
                    950: '#000000'
                },
                quinary: {
                    DEFAULT: '#996633',
                    50: '#E0C2A3',
                    100: '#DBB894',
                    200: '#D1A375',
                    300: '#C78F57',
                    400: '#B87A3D',
                    500: '#996633',
                    600: '#6F4A25',
                    700: '#452E17',
                    800: '#1B1209',
                    900: '#000000',
                    950: '#000000'
                },

            },
        },
    },
    plugins: [],
}
