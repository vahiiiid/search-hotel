<?php


namespace App\Services\Date;


class DateRangeGenerator
{
    /**
     * @param string $start
     * @param string $end
     * @return array
     */
    static function generate(string $start, string $end): array
    {
        $range = [];
        $start = strtotime($start);
        $end = strtotime($end);

        // obvious
        if ($start > $end) {
            return [];
        }

        do {
            $range[] = date('Y-m-d', $start);
            $start = strtotime("+ 1 day", $start);
        } while ($start < $end);

        return $range;
    }
}