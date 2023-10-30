<?php declare(strict_types=1);

namespace App\Entity;

readonly class Birthday
{
    private int $day;
    private int $month;
    private int $year;

    public function __construct(\DateTimeImmutable $dateTimeImmutable) {
        $this->day = (int) $dateTimeImmutable->format('d');
        $this->month = (int) $dateTimeImmutable->format('m');
        $this->year = (int) $dateTimeImmutable->format('y');
    }

    public function isBirthday(\DateTimeImmutable $compareToDate = new \DateTimeImmutable('now')): bool
    {
        $day = (int) $compareToDate->format('d');
        $month = (int) $compareToDate->format('m');
        return $this->day === $day && $this->month === $month;
    }

    public function __toString(): string
    {
        return "M".$this->month." ".$this->day;
    }

}