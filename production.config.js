const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const WebpackBuildNotifierPlugin = require("webpack-build-notifier");

const config = {
    mode: 'production',
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
        filename: 'admin.min.js',
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: `../css/admin.min.css`,
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
        filename: 'public.min.js',
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: `../css/public.min.css`,
        }),
    ],
} );

module.exports = [ admin, public ];
