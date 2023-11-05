<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = ['First'];

    /**
     * Render the view for creating a poll.
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Return the view for creating a poll using the "livewire.create-poll" template.
        return view('livewire.create-poll');
    }

    /**
     * Adds an option to the options array.
     */
    public function addOption()
    {
        $this->options[] = '';
    }

    /**
     * Removes an option from the list of options at the given index.
     *
     * @param int $index The index of the option to remove.
     * @return void
     */
    public function removeOption($index)
    {
        // Unset the option at the given index
        unset($this->options[$index]);

        // Re-index the options array
        $this->options = array_values($this->options);
    }
}
