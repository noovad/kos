<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RoomTypeForm extends Form
{
    #[Validate('required|min:2')]
    public string $name = '';

    #[Validate('required')]
    public string $description = '';

    #[Validate('required')]
    public int $price = 0;
}
