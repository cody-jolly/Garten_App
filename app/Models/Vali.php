<?php
## Adapted from PHP lesson with Alexander Freund

namespace App\Models;

/**
 * Class Vali
 * @package App\Models
 */
// Validates user input for transfer to DB
class Vali
{
    // Validate text input under 100 chars
    public function validateName($userInput)
    {
        if(isset($userInput) && $userInput != "") {
            //name has been entered
            if(strlen($userInput) < 100) {
                //name is ok
                return 1;
            }
        }
        return 0;
    }

    // Validate integer input
    public function validateInt($userInput)
    {
        if(isset($userInput) && $userInput != null) {
            //int has been entered
            return 1;
        }
        return 0;
    }

    // Validate email input
    public function validateEmail($userInput)
    {
        if(isset($userInput) && $userInput != "") {
            //email has been entered
            if(filter_var($userInput, FILTER_VALIDATE_EMAIL)) {
                //email is valid
                return 1;
            }
        }
        return 0;
    }
}