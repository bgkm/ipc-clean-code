<?php declare(strict_types=1);

namespace src;

readonly class FriendEntity
{
    public string $lastName;
    public string $firstName;
    public Birthday $dateOfBirth;
    public string $email;

    public function __construct(string $lastName, string $firstName, \DateTimeImmutable $dateOfBirth, string $email)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->dateOfBirth = new Birthday($dateOfBirth);
        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->firstName;
    }

}