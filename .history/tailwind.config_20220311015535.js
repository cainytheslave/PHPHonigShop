module.exports = {
    content: [
        "./*.{html,js,php}",
        "./core/*.php",
        "./includes/*.php"
    ],
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
            pattern: /border-(orange|green|red)-400/,
        },
        {
            pattern: /border-(green|red)-500/
        },
        {
            pattern: /bg-(green|red)-300/
        },
        {
            pattern: /cursor-pointer/
        }

    ],
    plugins: [],
}