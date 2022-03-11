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
            pattern: /max-w-(7xl|8xl|9xl|10xl)/,
        },
        {
            pattern: /text-(left|center|right)/,
        },
        {
            pattern: /grid-cols-(1|2|3|4|5|6|7|8|9|10|12)/,
        },
        {
            pattern: /gap-(1|2|3|4|5|6|7|8|9|10)/,
        },
        {
            pattern: /justify-(start|around|center|between|end)/,
        },
        {
            pattern: /fill-(orange|blue)-400/,
        },
    ],
    plugins: [],
}