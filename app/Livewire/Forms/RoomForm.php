<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RoomForm extends Form
{
    #[Validate('required')]
    public string $name = '123';
    #[Validate('required')]
    public string $room_type_id = '123';

}
