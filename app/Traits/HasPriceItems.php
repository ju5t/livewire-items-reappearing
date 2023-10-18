<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait HasPriceItems
{
    public Collection $items;

    public function mountHasPriceItems(): void
    {
        $this->items = collect();
    }

    public function add(): void
    {
        $item = [
            'price' => 0,
            'quantity' => 0,
        ];

        $this->items->push($item);
        $this->dispatch('item:changed', $item);
    }

    public function delete(int $key): void
    {
        $this->items = $this->items->reject(fn ($item, $id) => $id === $key);
        $this->dispatch('item:deleted');
    }
}
