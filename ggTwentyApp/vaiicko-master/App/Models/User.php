<?php

namespace App\Models;

use Framework\Core\IIdentity;
use Framework\Core\Model;

/**
 * Simple User value object representing an authenticated user.
 */
class User extends Model implements IIdentity
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
    public function setUsername(string $username): void {
        $this->username = $username;
    }
    public function setPassword(string $password): void {
        $this->password = $password;
    }
}
