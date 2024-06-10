<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RoomForm extends Form
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required', as: 'room type')]
    public string $room_type_id = '';
}
