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
    var cod = $('#cod_yes').is(':checked') ? 3000: 0;

    var total = harga * qty + cod;
    $('#rincianNamaProduk').text(namaProduk)
    $('#rincianJumlahProduk').text(qty)
    $('#rincianHargaProduk').text(harga)
    $('#rincianTotalProduk').text(total)
    $('#rincianHargaCod').text(cod)
    $('#inputTotalProduk').val(total)
    
    
    // console.log(harga)
}

$(document).on("change", "#selectProduk", function() {
    calculateTotal();
})

$(document).on("click", "#cod_yes", function() {
    calculateTotal();
});

$(document).on("click", "#cod_no", function() {
    calculateTotal();
});

$('#confirmationModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var msg = button.data('msg') // Extract info from data-* attributes
    var link = button.data('link')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body .text-msg-body').text(msg)
    modal.find('#submitConfirmationModal').on("click", function() {
        // console.log('deletelink',deleteLink)
        window.location.href=link;
    })
  })