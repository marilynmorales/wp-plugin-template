const webpack_b = require("./webpack.config.js");
const path = require("path");

let webpack_opts = {
  ...webpack_b,
};

webpack_opts.module.rules.push({
  test: /\.s?[ac]ss$/,
  include: path.join(__dirname, "./src"),
  use: ["style-loader", "css-loader", "resolve-url-loader", "sass-loader"],
});

module.exports = webpack_opts;