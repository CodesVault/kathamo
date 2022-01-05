const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const plugins = [
    new MiniCssExtractPlugin({
      filename: "../css/main.css",
      chunkFilename: "mian.min.css",
    }),
];

module.exports = {
    entry: `${__dirname}/assets/dev/js/main.js`,
    mode: 'development',
    output: {
      path: `${__dirname}/assets/js`,
      filename: 'bundle.js',
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
}
