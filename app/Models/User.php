<?php

namespace App\Models;

use App\Models\Database;
use App\Models\Vali;

/**
 * Class User
 * @package App\Models
 */
// Alters user data in DB, retrieves user data from DB
class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $regPass;
    private $userId;
    private $gardenId;
    private $loginEmail;
    private $loginPass;
    private $loginUserId;
    private $city;

    public function __construct()
    {
        if (isset($_SESSION['user']['userId'])) {
            $this->userId = $_SESSION['user']['userId'];
        }
        if (isset($_SESSION['user']['gardenId'])) {
            $this->gardenId = $_SESSION['user']['gardenId'];
        }
    }

    // Register main user data
    public function registerUser(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        $validate = new Vali();
        if ($validate->validateName($this->firstName) == 0 || $validate->validateName($this->lastName) == 0 || $validate->validateEmail($this->email) == 0 || $validate->validateName($this->regPass) == 0) {
            return 0;
        }

        $register = new Database();
        $register->setTable("user");
        $result = $register->where("email", "=", $this->email);
        if ($result->count() == 0) {
            $this->regPass = crypt($this->regPass, md5(uniqid()));
            $_SESSION['reg_userId'] = $this->userId = md5(uniqid());
            $_SESSION['reg_gardenId'] = $this->gardenId = md5(uniqid());
            $register->query("INSERT INTO user (firstName, lastName, email, userId, gardenId) VALUES (?,?,?,?,?);",
                                    [$this->firstName, $this->lastName, $this->email, $this->userId, $this->gardenId]);
            $register->query("INSERT INTO userPass (userId, password) VALUES (?,?);",
                                    [$this->userId, $this->regPass]);
            return 1;
        }
        return 0;
    }

    // Log user in
    public function loginUser (array $data) {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        $validate = new Vali();
        if ($validate->validateEmail($this->loginEmail) == 0 || $validate->validateName($this->loginPass) == 0) {
            return 0;
        }

        $checkEmail = new Database();
        $checkEmail->setTable("user");
        $checkEmail->where("email", "=", $this->loginEmail);
        if ($checkEmail->count() > 0) {
            $checkEmailResults = $checkEmail->first();
            $this->loginUserId = $checkEmailResults['userId'];

            $checkPass = new Database();
            $checkPass->setTable("userPass");
            $checkPass->where("userId", "=", $this->loginUserId);
            $checkPassResults = $checkPass->first();
            if (!(password_verify($this->loginPass, $checkPassResults['password']))) {
                return 0;
            }
            // Email and password match
            foreach ($checkEmailResults as $key => $value) {
                $this->{$key} = $value;
            }
            $_SESSION['user']['userId'] = $this->userId;
            $_SESSION['user']['gardenId'] = $this->gardenId;
            $_SESSION['user']['login'] = time();
            return 1;
        }
        return 0;
    }

    // Update main user data
    public function updateUser(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        $validate = new Vali();
        if ($validate->validateName($this->firstName) == 0 || $validate->validateName($this->lastName) == 0 || $validate->validateEmail($this->email) == 0 || $validate->validateName($this->city) == 0) {
            return 0;
        }

        $update = new Database();
        $update->query("UPDATE user SET firstName = ?, lastName = ?, email = ? WHERE userId = ?;",
                [$this->firstName, $this->lastName, $this->email, $this->userId]);
        $update->query("UPDATE city SET city = ? WHERE gardenId = ?",
                [$this->city, $this->gardenId]);
        return 1;
    }

    // Check if user is logged into SESSION, and if login is current
    public function sessionControl()
    {
        if (isset($_SESSION['user']['userId']) && $_SESSION['user']['login'] > (time() - 43200/* 12 hours in seconds*/ )) {
            return true;
        }

        return false;
    }

    // Return user data
    public function getUserData()
    {
        $getUser = new Database();
        return $getUser->setTable("user")->where("userId", "=", $this->userId)->first();
    }

    // Return user city data
    public function getUserCity()
    {
        $getCity = new Database();
        if (!isset($getCity->setTable("city")->where("gardenId", "=", $this->gardenId)->results()[0])) {
            return "Standort nicht registriert";
        }
        return $getCity->setTable("city")->where("gardenId", "=", $this->gardenId)->first()['city'];
    }
}