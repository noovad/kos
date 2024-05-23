<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\RoomTypeForm;
use App\Models\RoomType;
use Livewire\Component;

class RoomTypePosts extends Component
{

    public RoomTypeForm $form;

    public function store() {
        RoomType::create($this->form->validate());
        $this->form->reset();
        noty()->timeout(1000)->progressBar(false)->addSuccess('Product successfuly created.');
        redirect(route('admin.room-type'));
    }

    public function render()
    {
        return view('livewire.admin.room-type-posts');
    }
}
