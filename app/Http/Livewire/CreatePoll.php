<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Poll;

class CreatePoll extends Component
{
    public $title;
    public $options = ['First'];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:255'
    ];

    protected $messages = [
        'options.*' => "The option can\'t be empty."
    ];

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

    /**
     * Handle the updated event for a given property.
     *
     * @param string $propertyName The name of the property that was updated.
     * @return void
     */
    public function updated($propertyName)
    {
        // Validate the given property only
        $this->validateOnly($propertyName);
    }

    /**
     * Creates a poll with the given title and options.
     */
    public function createPoll()
    {
        // Validate the form
        $this->validate();

        // Create a new poll with the given title
        $poll = Poll::create([
            'title' => $this->title
        ]);

        // Create options for the poll
        foreach ($this->options as $optionName) {
            $poll->options()->create(['name' => $optionName]);
        }

        // Reset the title and options
        $this->reset(['title', 'options']);

        $this->emit('pollCreated');
    }
}
