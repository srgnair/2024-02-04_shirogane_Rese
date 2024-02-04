//inputに入力したらdivタグに文字が反映される

const formTestInputValue = document.forms.form_test.input_value;
//document.formsでformの中身を取得,さらに後ろの記述で細かく指定できる

formTestInputValue.addEventListener('input', () => {
    //formTestInputValueにinputがされたら
  
    let inputValueBox = document.getElementById('input_value_box');
    //input_value_boxのidを検索して
    
    inputValueBox.textContent = formTestInputValue.value
    //inputValueBoxのtextcontentにformTestInputValueのvalueをくっつける
})
