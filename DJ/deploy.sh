#!/bin/bash

echo "min css"
`java -jar ../yuicompressor-2.4.7.jar --type css style.css -o style.min.css`

echo "concat jquery-1.5.min.js, user.js, comments-ajax.min.js to dj.js"
`cat jquery-1.5.min.js user.js comments-ajax.min.js > dj.js`

echo "min dj.js to dj.min.js"
`java -jar ../yuicompressor-2.4.7.jar dj.js -o dj.min.js`
