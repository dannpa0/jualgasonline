require('./bootstrap');


$(document).on("click", ".browse", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
});

$('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});

$(document).on("click", "#qtyInc", function() {
    
    var qty = parseInt($('#qtyField').val());
    qty = qty + 1;
    $('#qtyField').val(qty);
    // console.log(qty, "inc");
    calculateTotal();
})

$(document).on("click", "#qtyDec", function() {
    // console.log('dec');
    var qty = parseInt($('#qtyField').val());
    if(qty == 0){
        return
    }
    qty = qty - 1;
    $('#qtyField').val(qty);

    calculateTotal();
})

function calculateTotal(){
    // var namaProduk = $('#selectProduk').find(":selected").data('nama');
    // var harga = parseFloat($('#selectProduk').find(":selected").data('harga'));

    var namaProduk = $('#rincianNamaProduk').text();
    var harga = parseFloat($('#rincianHargaProduk').text());
    var qty = parseInt($('#qtyField').val());

    var total = harga * qty;
    $('#rincianNamaProduk').text(namaProduk)
    $('#rincianJumlahProduk').text(qty)
    $('#rincianHargaProduk').text(harga)
    $('#rincianTotalProduk').text(total)
    $('#inputTotalProduk').val(total)
    console.log(harga)
}

$(document).on("change", "#selectProduk", function() {
    calculateTotal();
    
})