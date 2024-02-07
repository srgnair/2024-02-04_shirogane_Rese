const inputDate = document.querySelector('#inputDate');
const selectTime = document.querySelector('#selectTime');
const selectNumber = document.querySelector('#selectNumber');

inputDate.addEventListener('change', handleDateChange);

selectTime.addEventListener('change', handleTimeChange);

selectNumber.addEventListener('change', handleNumberChange);

function handleDateChange(event) {
    const inputtedDate = inputDate.value; // inputDateの値を取得
    document.querySelector('.log_date').innerHTML = inputtedDate;
}

function handleTimeChange(event) {
    const selectedTime = selectTime.value;
    document.querySelector('.log_time').innerHTML = selectedTime;
}

function handleNumberChange(event) {
    const selectedNumber = selectNumber.value;
    document.querySelector('.log_number').innerHTML = selectedNumber + '人';
}