// Adapted from PHP lesson with Alexander Freund

// Show alert type given with given message
function showAlert(type, message) {
    $('#alert' + type).removeClass('d-none');
    $('#alert' + type + 'message').html(message);
}

// Hide all alerts and clear messages
function hideAlerts() {
    $('#alert1').addClass('d-none');
    $('#alert2').addClass('d-none');
    $('#alert3').addClass('d-none');
    $('#alert4').addClass('d-none');
    $('#alert1message').html('');
    $('#alert2message').html('');
    $('#alert3message').html('');
    $('#alert4message').html('');
}