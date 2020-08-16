Nova.booting((Vue, router, store) => {
  Vue.component('index-double', require('./components/IndexField'))
  Vue.component('detail-double', require('./components/DetailField'))
  Vue.component('form-double', require('./components/FormField'))
})
