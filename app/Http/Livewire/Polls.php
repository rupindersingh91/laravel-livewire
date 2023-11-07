<?php

namespace App\Http\Livewire;

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

    public function vote($optionId)
    {
        $option = \App\Models\Option::findOrfail($optionId);
        $option->votes()->create();
    }
}
