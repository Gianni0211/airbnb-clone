module.exports = {
    purge: ['./src/**/*.{vue,js,ts,jsx,tsx}'],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito'],
            },
            backgroundImage: ['hover', 'focus'],
        },
        container: {
            center: true,
            padding: {
                DEFAULT:  '1rem',  
                sm: '2rem',
                lg: '4rem',
                xl: '8rem',
                '2xl': '6rem',
            }
          },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [],
};
