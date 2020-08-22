// Validate user registration input, handle result
function registerUser() {
    let firstName = $('#ip-reg__first-name');
    let lastName = $('#ip-reg__last-name');
    let email = $('#ip-reg__email');
    let pass1 = $('#ip-reg__pass1');
    let pass2 = $('#ip-reg__pass2');

    hideAlerts();

    // Import validation class
    import(window.rootpath + "js/Vali.js")
        .then((module) => {
            const validate = new module.Vali();
            if (validate.validateText(firstName.val())) {
                // firstName ok
                firstName.removeClass('border-danger');
                hideAlerts();
                if (validate.validateText(lastName.val())) {
                    // firstName ok
                    lastName.removeClass('border-danger');
                    hideAlerts();
                    if (validate.validateEmail(email.val())) {
                        // firstName ok
                        email.removeClass('border-danger');
                        hideAlerts();
                        if (validate.validateText(pass1.val())) {
                            // firstName ok
                            pass1.removeClass('border-danger');
                            hideAlerts();
                            if (pass1.val() == pass2.val()) {
                                // passwords match
                                pass2.removeClass('border-danger');
                                $('#alert2').addClass('d-none');
                                $('#alert2message').html('');
                                // Send data on for further processing
                                $.ajax({
                                    url: window.rootpath + 'user',
                                    type: 'post',
                                    async: true,
                                    data: {
                                        "func": "registerUser",
                                        "firstName": firstName.val(),
                                        "lastName": lastName.val(),
                                        "email": email.val(),
                                        "regPass": pass1.val()
                                    },
                                    beforeSend: function(){
                                        $('#reg__button').attr('disabled', true);
                                    }
                                }).done(function(feedback) {
                                    console.log(feedback);
                                    if (feedback == 1) {
                                        // Registration successful
                                        showAlert('4','<a href="#" onclick="loadModal(\'login\')">Weiter</a>');
                                    } else {
                                        // Registration failed
                                        showAlert('3', 'E-Mail Adresse wird schon verwendet, bitte wählen Sie eine andere.');
                                        $('#reg__button').attr('disabled', false);
                                    }
                                });
                            } else {
                                pass2.addClass('border-danger');
                                showAlert('2', 'Passwörter stimmen nicht überein.');
                            }
                        } else {
                            pass1.addClass('border-danger');
                            showAlert('3', 'Bitte vervollständigen Sie Ihre Angaben.');
                        }
                    } else {
                        email.addClass('border-danger');
                        showAlert('3', 'Bitte vervollständigen Sie Ihre Angaben.');
                    }
                } else {
                    lastName.addClass('border-danger');
                    showAlert('3', 'Bitte vervollständigen Sie Ihre Angaben.');
                }
            } else {
                firstName.addClass('border-danger');
                showAlert('3', 'Bitte vervollständigen Sie Ihre Angaben.');
            }
        });
}

// Validate user login input, handle result
function loginUser() {
    let email = $('#ip-login__email');
    let pass = $('#ip-login__pass');

    hideAlerts();

    // Import validation class
    import(window.rootpath + "js/Vali.js")
        .then((module) => {
            const validate = new module.Vali();
            if (validate.validateEmail(email.val())) {
                // email ok
                email.removeClass('border-danger');
                hideAlerts();
                if (validate.validateText(pass.val())) {
                    // password ok
                    pass.removeClass('border-danger');
                    hideAlerts();
                    // Send data on for further processing
                    $.ajax({
                        url: window.rootpath + 'user',
                        type: 'post',
                        async: true,
                        data: {
                            "func": "loginUser",
                            "loginEmail": email.val(),
                            "loginPass": pass.val()
                        },
                        beforeSend: function(){
                            $('#login__button').attr('disabled', true);
                        }
                    }).done(function(feedback) {
                        console.log(feedback);
                        $('#login__button').attr('disabled', false);
                        if (feedback == 1) {
                            // Login successful
                            location.href = (window.rootpath + 'dashboard');
                        } else {
                            showAlert('3', 'Die angegebene Kombination aus E-Mail und Passwort ist ungültig.');
                        }
                    });
                } else {
                    pass.addClass('border-danger');
                    showAlert('3', 'Bitte geben Sie ein Passwort ein.');
                }
            } else {
                email.addClass('border-danger');
                showAlert('3', 'E-mail ungültig.');
            }
        });
}