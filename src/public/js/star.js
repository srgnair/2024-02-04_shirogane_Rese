const StarRating = window.VueStarRating.default;

Vue.component('star-rating', StarRating);
let app = new Vue({
  el: '#app',
  data: {
    rating: 0
  },
  methods: {
    submitForm() {
      console.log(this.rating);  // 送信前にratingの値を確認
    }
  }
});
