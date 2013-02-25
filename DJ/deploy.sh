#!/bin/bash

echo "min style.css to style.min.css"
`yuicompressor  --type css style.css -o style.min.css`

echo "min user.js to user.min.js"
`yuicompressor user.js -o user.min.js`

echo "min comments-ajax.js to comments-ajax.min.js"
`yuicompressor comments-ajax.js -o comments-ajax.min.js`

echo "concat jquery-1.5.min.js, user.js, comments-ajax.min.js to dj.min.js"
`cat jquery-1.5.min.js user.min.js comments-ajax.min.js > dj.min.js`

echo "remove user.min.js, comments-ajax.min.js"
`rm -f user.min.js comments-ajax.min.js`
