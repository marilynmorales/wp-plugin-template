const webpack_b = require("./webpack.config.js");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require("path");

let webpack_opts = { ...webpack_b };

webpack_opts.mode = "production";

webpack_opts.module.rules.push({
  test: /\.s?[ac]ss$/,
  include: path.join(__dirname, "./src"),
  use: [
    MiniCssExtractPlugin.loader,
    "css-loader",
    "resolve-url-loader",
    {
      loader: "sass-loader",
      options: {
        sourceMap: true,
      },
    },
  ],
});

webpack_opts.plugins.push(
  new MiniCssExtractPlugin({
    filename: "[name]-[fullhash].css",
  })
);

module.exports = webpack_opts;