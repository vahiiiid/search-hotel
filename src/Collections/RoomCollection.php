<?php


namespace App\Collections;


use App\Models\Room;

/**
 * @property  int max_person
 */
class RoomCollection
{
    /**
     * @var array
     */
    protected array $list = [];

    /**
     * The constructor.
     *
     * @param Room ...$room The rooms
     */
    public function __construct(Room ...$room)
    {
        $this->list = $room;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->list;
    }

    /**
     * Add model to list.
     *
     * @param Room $model
     *
     * @return void
     */
    public function add(Room $model): void
    {
        $this->list[] = $model;
    }
}