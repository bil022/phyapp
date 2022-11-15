function getPublicPath() {
  switch (process.env.NODE_ENV) {
    case 'production': return './'
    default: return './'
  }
}

const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  publicPath: getPublicPath(),
  transpileDependencies: [
    'vuetify'
  ]
})

