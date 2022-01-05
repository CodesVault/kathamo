const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

const plugins = [
    new MiniCssExtractPlugin({
      filename: "../css/main.min.css",
      chunkFilename: "mian.min.css",
    }),
];

module.exports = {
    entry: `${__dirname}/assets/dev/js/main.js`,
    mode: 'production',
    output: {
      path: `${__dirname}/assets/js`,
      filename: 'bundle.min.js',
    },
    plugins,
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
    },
    optimization: {
        minimize: true,
        minimizer: [
            new CssMinimizerPlugin(),
        ],
    },
}
