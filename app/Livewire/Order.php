<?php

namespace App\Livewire;

use App\Traits\HasPriceItems;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Order extends Component
{
    use HasPriceItems;

    public function rules(): array
    {
        return [
            'items.*.price' => 'required',
            'items.*.quantity' => 'required',
        ];
    }

    public function render(): View
    {
        return view('livewire.order');
    }
}
