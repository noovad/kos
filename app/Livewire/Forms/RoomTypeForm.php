<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RoomTypeForm extends Form
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required|max:9999999')]
    public int $price;

    #[Validate('required')]
    public string $description = '';
}
