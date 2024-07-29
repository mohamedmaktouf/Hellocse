<?php

namespace App\DTOs;

class UserDTO
{
    /**
     * @var string
     */
    public string $email;
    /**
     * @var string
     */
    public string $password;

    /**
     * @param string $email
     * @param string $password
     */
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        return [
            'email' => $this->email,
            'password' => $this->password
        ];
    }


}
