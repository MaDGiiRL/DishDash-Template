<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter;
    public $originalServings;
    public $ingredients;

    public function mount($originalServings, $ingredients)
    {
        $this->counter = $originalServings;
        $this->originalServings = $originalServings;

        if (is_string($ingredients)) {
            $decoded = json_decode($ingredients, true);
            $this->ingredients = is_array($decoded) ? $decoded : [];
        } else {
            $this->ingredients = $ingredients;
        }
    }

    public function increment()
    {
        $this->counter++;
    }

    public function decrement()
    {
        if ($this->counter > 1) {
            $this->counter--;
        }
    }

    public function getUpdatedIngredients()
    {
        return collect($this->ingredients)->map(function ($ingredient) {
            if (is_array($ingredient) && isset($ingredient['name'], $ingredient['quantity'], $ingredient['unit'])) {
                return [
                    'name' => $ingredient['name'],
                    'quantity' => ($ingredient['quantity'] * $this->counter) / $this->originalServings,
                    'unit' => $ingredient['unit']
                ];
            }
            return null;
        })->filter()->toArray();
    }

    public function render()
    {
        return view('livewire.counter', [
            'updatedIngredients' => $this->getUpdatedIngredients()
        ]);
    }
}
