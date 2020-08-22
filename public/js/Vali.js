// Export validation class
// Validate user input
export class Vali
{
    constructor() {
    }

    // Validate text input, no longer than 100 chars
    validateText(text) {
        return !(text == "" || text == undefined || text.length < 2 || text.length > 100);
    }

    // Validate number input
    validateNumber(number) {
        return !(number == "" || number == undefined || number.length < 1 || number.length > 100);
    }

    // Validate Email input
    validateEmail(email) {
        const regExEmail = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
        if (email == "" || email == undefined || email.length < 5 || email.length > 250) {
            return false;
        } else {
            return regExEmail.test(email);
        }
    }

    // Validate select input
    validateSelect(select) {
        return !(select == "0");
    }
}