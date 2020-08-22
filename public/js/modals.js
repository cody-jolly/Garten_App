// Load modal content
function loadModal(modal) {
    $('#modal-content').html('');

    $('.button-orange').attr('disabled', false);
    $('.alert').addClass('d-none');
    $('.alert-message').html('');

    $.get(window.rootpath + "src/modal/" + modal, function(data){
        $('#modal-content').html(data);
    });
}
