module.exports = {
    purge: ["./src/**/*.{vue,js,ts,jsx,tsx}"],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
          colors: {
            air: {
                "50": "#fcf8f6",
                "100": "#fceeef",
                "200": "#fbd2dd",
                "300": "#faadbe",
                "400": "#fa778c",
                "500": "#ff5a5f",
                "600": "#f52e41",
                "700": "#da2338",
                "800": "#b01d31",
                "900": "#8d1929"
            }
        },
        
        },
        
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                lg: "4rem",
                xl: "8rem",
                "2xl": "6rem"
            }
        }
    },
    variants: {
        extend: {}
    },
    plugins: []
};
