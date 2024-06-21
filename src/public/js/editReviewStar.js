const StarRating = window.VueStarRating.default;

document.addEventListener('DOMContentLoaded', function () {
    // star-ratingコンポーネントの登録
    Vue.component('star-rating', window.VueStarRating.default);

    // 初期値をHTMLのdata属性から取得
    var initialRating = document.getElementById('app').getAttribute('data-rating');

    // Vueインスタンスの初期化
    new Vue({
        el: '#app',
        data: {
            rating: Number(initialRating) // 初期値を数値に変換して設定
        }
    });
});
