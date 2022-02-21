<?php

namespace App;

use App\Collections\RoomCollection;
use App\Requests\SearchRequest;
use App\Services\Date\DateRangeGenerator;

class SearchController
{
    public function searchAction()
    {
        // fetching data from files or upstream
        $fantastic = json_decode(file_get_contents(__DIR__ . '/../data/fantastic-yurts.json'));
        $fraught = json_decode(file_get_contents(__DIR__ . '/../data/fraught-lodgings.json'));

        // making objects of room and having a collection of rooms
        $rooms = new RoomCollection();

        // making a request
        $request = new SearchRequest();

        // requested dates range
        $dates = DateRangeGenerator::generate($request->get('check_in_date'), $request->get('check_out_date'));

        $bestRoom = null;
        $highestMargin = 0;
        foreach ($rooms->all() as $room) {
            $price = 0;
            // max person filter
            if (!$room->isMaxPersonAllowed($request->get('max_person'))) {
                continue;
            }

            // time filter
            foreach ($dates as $date) {
                if (!$room->isDateAvailable($date)) {
                    continue 2;
                }
                $price += $room->getPriceByDate($date);
            }

            // calculate commission and margin
            $margin = $price - $room->calculateCommission($price);
            if ($margin > $highestMargin) {
                $bestRoom = $room;
                $highestMargin = $margin;
            }
        }

        return $bestRoom;
    }
}