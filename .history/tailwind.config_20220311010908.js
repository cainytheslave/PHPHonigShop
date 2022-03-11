module.exports = {
    content: ["./**/*.{html,js,php}"],
    theme: {
        extend: {
            colors: {
                honey: '#d3750d',
                honeylight: '#d3ab05',
                honeygreen: '#239b02'
            }
        },
    },
    safelist: [{
        pattern: /fill-(orange|green|red)-500/,
    }, ],
    plugins: [],
}