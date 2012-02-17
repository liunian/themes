#!/bin/bash

echo "for dev, use non-min version"
cp style.css style.min.css

echo "concat jquery-1.5.min.js, user.js, comments-ajax.js to dj.min.js"
`cat jquery-1.5.min.js user.js comments-ajax.js > dj.min.js`
