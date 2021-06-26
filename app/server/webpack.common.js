module.exports = {
  entry: `./src/index.js`,
  output: {
    path: `${__dirname}/public/dist`,
    filename: "main.js",
    clean: true,
  },
}
