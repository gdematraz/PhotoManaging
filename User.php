<?php

class User
{
    private $con = null;

    private $username = '';
    private $password = '';
    private $firstname = '';
    private $lastname = '';

    private $errors = [
        'username' => false,
        'password' => false,
        'firstname' => false,
        'lastname' => false,
        'error' => false
    ];

    public function __construct($con)
    {
        $this->con = $con;
    }

    /**
     * Cette fonction ajoute un utilisateur
     * @param string $username
     * @param string $password
     * @param string $firstname
     * @param string $lastname
     * @return bool
     */
    public function add($username = '', $password = '', $firstname = '', $lastname = '')
    {
        $errors = false;

        $this->username = $username;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        if (strlen($this->username) < 3) {
            $errors = true;
            $this->errors['username'] = true;
        }

        if (strlen($this->password) < 3) {
            $errors = true;
            $this->errors['password'] = true;
        }

        if (strlen($this->firstname) < 3) {
            $errors = true;
            $this->errors['firstname'] = true;
        }

        if (strlen($this->lastname) < 3) {
            $errors = true;
            $this->errors['lastname'] = true;
        }

        if (count($this->errors) == 0) {
            if (!$this->con->query('INSERT INTO user (username, password, firstname, lastname) VALUES ("' . $this->username . '", "' . $this->password . '", "' . $this->firstname . '", "' . $this->lastname . '")') === true) {
                $errors = true;
                $this->errors['error'] = true;
            }
        }

        return $errors;
    }

    /**
     * @param $id
     * @param string $username
     * @param string $password
     * @param string $firstname
     * @param string $lastname
     */
    public function update($id, $username = '', $password = '', $firstname = '', $lastname = '')
    {

    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param $value
     * @return string
     */
    public function getError($value)
    {
        return $this->errors[$value];
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }


}