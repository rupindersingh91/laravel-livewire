<?php

namespace App\Http\Livewire;

use App\Models\Option;
use Livewire\Component;

class Polls extends Component
{

    protected $listeners = [
        'pollCreated' => 'render'
    ];

    /**
     * Render the polls view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        // Retrieve the latest polls with their options and votes
        $polls = \App\Models\Poll::with('options.votes')->latest()->get();

        // Return the polls view with the retrieved polls
        return view('livewire.polls', ['polls' => $polls]);
    }

    /**
     * Vote for an option.
     *
     * @param Option $option The option to vote for.
     * @return void
     */
    public function vote(Option $option)
    {
        // Create a new vote for the option
        $option->votes()->create();
    }
}
