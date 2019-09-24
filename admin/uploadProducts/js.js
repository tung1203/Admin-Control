//format currency input
// function formatCurrency(val) {
//     while (/(\d+)(\d{3})/.test(val.toString())) {
//         val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
//     }
//     return val;
// }
//
// function numberWithCommas(x) {
//     var parts = x.toString().split(".");
//     parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
//     return parts.join(".");
// }

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}


productPrice = document.getElementById('productPrice');
productPrice.addEventListener('focusout', (e) => {
    // console.log(e.target.value);
    e.target.value = e.target.value.replace(/,/g, '');
    e.target.value = formatNumber(e.target.value);
});
