$('#edit-user').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('user') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#edit_user_id').val(recipient);
    var base = $('#base_url').val();
    $.ajax({
        method: 'POST',
        url: base + 'usuarios/getonejson',
        data: { id: recipient },
        dataType: 'json',
        success: function (request) {
            $('#edit_name_user').val(request['nombre']);
            $('#edit_email_user').val(request['email']);
            $('#edit_rol_user option[value="' + request['rol'] + '"]').prop('selected', true);

        }
    });
})


$('#change-user').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('user') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#change_user_id').val(recipient);
    var base = $('#base_url').val();
   

})