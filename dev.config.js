const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const WebpackBuildNotifierPlugin = require("webpack-build-notifier");

const config = {
    mode: 'development',
    module: {
        rules: [
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    "css-loader",
                    "postcss-loader",
                    "sass-loader",
                ],
            },
        ],
    }
}

const admin = Object.assign( {}, config, {
    entry: `${__dirname}/assets/dev/admin/js/admin.js`,
    output: {
        path: `${__dirname}/assets/admin/js`,
        filename: 'admin.js',
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: `../css/admin.css`,
        }),
        new WebpackBuildNotifierPlugin({
            title: "Howdy",
            suppressSuccess: true,
        }),
    ],
} );

const public = Object.assign( {}, config, {
    entry: `${__dirname}/assets/dev/public/js/main.js`,
    output: {
        path: `${__dirname}/assets/public/js`,
        filename: 'public.js',
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: `../css/public.css`,
        }),
    ],
} );

module.exports = [ admin, public ];
