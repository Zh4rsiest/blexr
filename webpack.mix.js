// let VueLoaderPlugin = require('vue-loader/lib/plugin');
// const path = require("path");
//
// module.exports = {
//   entry: './resources/js/main.js',
//   output: {
//     filename: 'app.js',
//     path: path.join(__dirname, "public/js"),
//   },
//   module: {
//         rules: [
//             { test: /\.vue$/, use: 'vue-loader' }
//         ]
//     },
//   plugins: [
//     new VueLoaderPlugin(),
//   ]
// };

const mix = require('laravel-mix');

mix.js('resources/js/main.js', 'public/js')
   .sass('resources/css/main.scss', 'public/css');;
