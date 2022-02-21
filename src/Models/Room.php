<?php


namespace App\Models;


class Room extends Model
{

    public function __construct(
        public int $id,
        public int $maxPerson,
        public int $Beds,
        public array $availability,
        public float $fixedCommission = 0,
        public int $percentCommission = 0
    ) {
    }

    /**
     * @param int $quantity
     * @return bool
     */
    public function isMaxPersonAllowed(int $quantity): bool
    {
        return $quantity <= $this->maxPerson;
    }

    /**
     * @param string $date
     * @return bool
     */
    public function isDateAvailable(string $date): bool
    {
        return array_key_exists($date, $this->availability);
    }

    /**
     * @param string $date
     * @return int
     */
    public function getPriceByDate(string $date): int
    {
        return $this->availability[$date];
    }

    /**
     * @param int $price
     * @return float|int
     */
    public function calculateCommission($price = 0): float|int
    {
        $commission = 0;

        if ($this->fixedCommission) {
            $commission += $this->fixedCommission;
        }

        if ($this->percentCommission) {
            $commission += $this->percentCommission * $price;
        }

        return $commission;
    }

}