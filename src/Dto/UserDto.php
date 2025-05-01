<?php

namespace App\Dto;

class UserDto
{
    public function __construct(
        private readonly string $username,
        private readonly string $email,
    ) {
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
