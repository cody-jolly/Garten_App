// Validate and register garden info
function gardenReg() {
    hideAlerts();
    let city = $('#ip-gardenReg__city');
    let country = $('#ip-gardenReg__country');
    let householdSize = $('#ip-gardenReg__household');

    // Import validation class
    import(window.rootpath + "js/Vali.js")
        .then((module) => {
            const validate = new module.Vali();
            if (validate.validateText(city.val())) {
                city.removeClass('border-danger');
                if (validate.validateSelect(country.val())) {
                    country.removeClass('border-danger');
                    if (validate.validateNumber(householdSize.val())) {
                        householdSize.removeClass('border-danger');
                        hideAlerts();
                        // Send data on for further processing
                        $.ajax({
                            url: window.rootpath + 'garden',
                            type: 'post',
                            async: true,
                            data: {
                                "func": "registerGarden",
                                "city": city.val(),
                                "country": country.val(),
                                "householdSize": householdSize.val()
                            },
                            beforeSend: function(){
                                $('#garden-reg__button').attr('disabled', true);
                            }
                        }).done(function(feedback) {
                            console.log(feedback);
                            $('#garden-reg__button').attr('disabled', false);
                            if (feedback == 1) {
                                // Load next modal in registration process, garden-varieties
                                loadModal('garden-varieties');
                            } else {
                                hideAlerts();
                                showAlert('2', 'Ihre Informationen könnten nicht unserer Datenbank hinzugefügt werden. Bitte <a class="text-primary" href="home#kontakt">kontaktieren Sie uns</a> umgehend, um dieses Problem zu melden.');
                            }
                        });
                    } else {
                        householdSize.addClass('border-danger');
                        showAlert('3', 'Bitte vervollständigen Sie alle Angaben um die Registrierung fortzusetzen.');
                    }
                } else {
                    country.addClass('border-danger');
                    showAlert('3', 'Bitte vervollständigen Sie alle Angaben um die Registrierung fortzusetzen.');
                }
            } else {
                city.addClass('border-danger');
                showAlert('3', 'Bitte vervollständigen Sie alle Angaben um die Registrierung fortzusetzen.');
            }
        });
}

// Register variety info
function varietiesReg(isUpdate) {
    hideAlerts();
    let vegPreferred = $(":checked");
    let varieties = [];


    if (vegPreferred.length > 0) {
        hideAlerts();
        for (let i = 0; i < vegPreferred.length; i++) {
            varieties.push(vegPreferred[i].value);
        }
        let varietiesStr = varieties.join(',');
        // Send data on for further processing
        $.ajax({
            url: window.rootpath + 'garden',
            type: 'post',
            async: true,
            data: {
                "func": "registerVarieties",
                "varieties": varietiesStr,
            },
            beforeSend: function() {
                $('#garden-varieties__button').attr('disabled', true);
            }
        }).done(function(feedback) {
            console.log(feedback);
            $('#garden-varieties__button').attr('disabled', false);
            if (feedback == 1) {
                if (!isUpdate) {
                    // Load next modal in registration process, garden-beds
                    loadModal('garden-beds');
                } else {
                    // Complete update
                    console.log('update complete');
                    loadModal('update-complete');
                }
            } else {
                showAlert('2', 'Ihre Informationen könnten nicht unserer Datenbank hinzugefügt werden. Bitte <a class="text-primary" href="home#kontakt">kontaktieren Sie uns</a> umgehend, um dieses Problem zu melden.');
            }
        });
    } else {
        showAlert(3, 'Bitte geben Sie zumindest eine Gemüsesorte an.');
    }
}

// Add bed to garden
function addBed(isUpdate) {
    hideAlerts();
    console.log('add bed');
    let bedNr = $('#ip-gardenBeds__bedNr');
    let length = $('#ip-gardenBeds__length');
    let width = $('#ip-gardenBeds__width');
    let area;

    // Import validation class
    import(window.rootpath + "js/Vali.js")
        .then((module) => {
            const validate = new module.Vali();
            if (validate.validateNumber(bedNr.val())) {
                bedNr.removeClass('border-danger');
                if(validate.validateNumber(length.val())) {
                    length.removeClass('border.danger');
                    if(validate.validateNumber(width.val())) {
                        width.removeClass('border-danger');
                        area = (length.val() * width.val());
                        // Send data on for further processing
                        $.ajax({
                            url: window.rootpath + 'bed',
                            type: 'post',
                            async: true,
                            data: {
                                "func": "addBed",
                                "bedNr": bedNr.val(),
                                "area": area
                            }
                        }).done(function (feedback)
                        {
                            console.log(feedback);
                            if (feedback == 1) {
                                hideAlerts();
                                bedNr.removeClass('border-danger');
                                $('#bed-overview-wrap').removeClass('d-none');
                                loadOverview('bed-overview', '.garden-bed-overview');
                                if (!isUpdate) {
                                    // Bed added, give possibility to complete registration
                                    showAlert('4', 'Gartenbeet ' + bedNr.val() + ' wurde erfolgreich hinzugefügt. Fügen Sie noch mehr Beete hinzu, oder <a href="#" class="text-primary" onclick="loadModal(\'welcome\')">schließen Sie die Registrierung ab.</a>');
                                } else if (isUpdate) {
                                    // Bed added
                                    showAlert('4', 'Gartenbeet ' + bedNr.val() + ' wurde erfolgreich hinzugefügt.');
                                    $('#addBedCard').removeClass('show');
                                }
                            } else {
                                hideAlerts();
                                showAlert('2', 'Beetnummer wird schon benutzt, bitte wählen Sie eine andere Nummer.');
                                bedNr.addClass('border-danger');
                            }
                        });

                    } else {
                        width.addClass('border-danger');
                        showAlert('3', 'Bitte vervollständigen Sie Ihre Angaben.')
                    }
                } else {
                    length.addClass('border-danger');
                    showAlert('3', 'Bitte vervollständigen Sie Ihre Angaben.')
                }
            } else {
                bedNr.addClass('border-danger');
                showAlert('3', 'Bitte vervollständigen Sie Ihre Angaben.')
            }
        });
}

// Delete bed in garden
function deleteBed() {
    hideAlerts();
    console.log('delete bed');
    let bedNr = $('#ip-deleteBed__bedNr');

    // Import validation class
    import(window.rootpath + "js/Vali.js")
        .then((module) => {
            const validate = new module.Vali();
            if (validate.validateNumber(bedNr.val())) {
                bedNr.removeClass('border-danger');
                // Send data on for further processing
                $.ajax({
                    url: window.rootpath + 'bed',
                    type: 'post',
                    async: true,
                    data: {
                        "func": "deleteBed",
                        "bedNr": bedNr.val()
                    }
                }).done(function (feedback)
                {
                    console.log(feedback);
                    if (feedback == 1) {
                        // Bed deleted
                        hideAlerts();
                        bedNr.removeClass('border-danger');
                        loadOverview('bed-overview', '.garden-bed-overview');
                        showAlert('4', 'Gartenbeet ' + bedNr.val() + ' wurde erfolgreich gelöscht.');
                        $('#deleteBedCard').removeClass('show');
                    } else {
                        hideAlerts();
                        showAlert('2', 'Beetnummer könnte nicht gefunden werden, bitte überprüfen Sie Ihre Angaben.');
                        bedNr.addClass('border-danger');
                    }
                });
            } else {
                bedNr.addClass('border-danger');
                showAlert('3', 'Bitte vervollständigen Sie Ihre Angaben.');
            }
        });
}

// Validate user update input, handle result
function updateUser() {
    let firstName = $('#ip-upd__first-name');
    let lastName = $('#ip-upd__last-name');
    let email = $('#ip-upd__email');
    let city = $('#ip-upd__city');

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
                    // lastName ok
                    lastName.removeClass('border-danger');
                    hideAlerts();
                    if (validate.validateEmail(email.val())) {
                        // email ok
                        email.removeClass('border-danger');
                        hideAlerts();
                        if (validate.validateText(city.val())) {
                            // city ok
                            city.removeClass('border-danger');
                            hideAlerts();
                            // Send data on for further processing
                            $.ajax({
                                url: window.rootpath + 'user',
                                type: 'post',
                                async: true,
                                data: {
                                    "func": "updateUser",
                                    "firstName": firstName.val(),
                                    "lastName": lastName.val(),
                                    "email": email.val(),
                                    "city": city.val()
                                },
                                beforeSend: function () {
                                    $('#update__button').attr('disabled', true);
                                }
                            }).done(function (feedback) {
                                console.log(feedback);
                                if (feedback == 1) {
                                    // Update successful
                                    showAlert('4', 'Profil erfolgreich aktualisiert.');
                                } else {
                                    // Update failed
                                    showAlert('3', 'Aktualisierung der Daten könnte nicht ausgeführt werden, bitte überprüfen Sie Ihre Angaben.');
                                    $('#update__button').attr('disabled', false);
                                }
                            });
                        } else {
                            city.addClass('border-danger');
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

// Save garden profile changes
function updateGP() {
    let householdSize = $('#ip-gp__household');

    // Import validation class
    import(window.rootpath + "js/Vali.js")
        .then((module) => {
            const validate = new module.Vali();
            if (validate.validateNumber(householdSize.val())) {
                householdSize.removeClass('border-danger');
                hideAlerts();
                // Send data on for further processing
                $.ajax({
                    url: window.rootpath + 'garden',
                    type: 'post',
                    async: true,
                    data: {
                        "func": "updateHousehold",
                        "householdSize": householdSize.val()
                    }
                    }).done(function(feedback) {
                        console.log(feedback);
                        if (feedback == 1) {
                            // Household size updated, update varieties
                            varietiesReg(true);
                            showAlert('4', 'Ihre Änderungen wurden gespeichert');
                        } else {
                            hideAlerts();
                            showAlert('2', 'Ihre Informationen könnten nicht unserer Datenbank hinzugefügt werden. Bitte <a class="text-primary" href="home#kontakt">kontaktieren Sie uns</a> umgehend, um dieses Problem zu melden.');
                    }
                });
            } else {
                householdSize.addClass('border-danger');
            }
            showAlert('3', 'Bitte vervollständigen Sie alle Angaben.');
        });
}

// Invoke location reload
function reload() {
    location.reload();
}

$('#modal').on('hidden.bs.modal', reload);

