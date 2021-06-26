const { merge } = require('webpack-merge');
const config = require('config');
const SentryWebpackPlugin = require("@sentry/webpack-plugin");
const common = require('./webpack.common.js');

module.exports = merge(common, {
  mode: 'production',
  devtool: "hidden-source-map",
  plugins: [
    new SentryWebpackPlugin({
      // sentry-cli configuration
      authToken: config.Sentry.token,
      org: config.Sentry.org,
      project: config.Sentry.project,
      release: config.Sentry.release,
      urlPrefix: '~/dist/',
 
      // webpack specific configuration
      include: "./public/dist",
      ignore: ["node_modules", "webpack.config.js"],
    }),
  ],
});
