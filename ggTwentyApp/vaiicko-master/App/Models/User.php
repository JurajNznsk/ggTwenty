<?php

namespace App\Models;

use Framework\Core\IIdentity;

/**
 * Simple User value object representing an authenticated user.
 */
class User implements IIdentity
{
    public ?int $id = null;
    protected string $username = '';
    protected string $password = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}
