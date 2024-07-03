const StarRating = window.VueStarRating.default;

Vue.component('star-rating', StarRating);
<<<<<<< HEAD
new Vue({
    el: '#app',
    data: {
        rating: 5
    }
});
=======
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
>>>>>>> parent of a5ff6e7 (Fixed untracked files issue)
