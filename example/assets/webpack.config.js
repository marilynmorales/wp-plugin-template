const path = require("path");
const WebpackAssetsManifest = require("webpack-assets-manifest");

module.exports = {
  mode: "development",
  entry: {
    main: path.join(__dirname, "./src/js/index.js"),
  },
  output: {
    path: path.join(__dirname, "dist"),
    filename: "[name]-[fullhash].js",
    chunkFilename: "[id]-[chunkhash].js",
  },
  module: {
    rules: [
      {
        test: /\.svg/,
        type: "asset/inline",
      },
      {
        test: /\.m?js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
    ],
  },
  plugins: [new WebpackAssetsManifest()],
};