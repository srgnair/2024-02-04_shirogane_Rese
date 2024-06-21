const StarRating = window.VueStarRating.default;

Vue.component('star-rating', StarRating);
new Vue({
    el: '#app',
    data: {
        rating: 5
    }
});