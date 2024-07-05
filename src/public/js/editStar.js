document.addEventListener('DOMContentLoaded', function () {
const starRatingValue = document.getElementById('star-rating-value').value;
const StarRating = window.VueStarRating.default;

Vue.component('star-rating', StarRating);
new Vue({
    el: '#app',
    data: {
        rating: Number(starRatingValue) 
    }
});
});