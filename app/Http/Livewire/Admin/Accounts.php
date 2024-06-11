<?php

namespace App\Http\Livewire\Admin;

use App\Models\Account;
use Livewire\Component;

class Accounts extends Component
{
    public $account_id;
    public $facebook;
    public $instagram;
    public $twitter;
    public $tiktok;
    public $youtube;
    public $linkedin;

    public $accounts;

    public function mount()
    {
        $this->accounts = Account::all();
    }

    public function render()
    {
        return view('livewire.admin.accounts');
    }

    public function create()
    {
        $this->validate([
            'facebook' => 'required',
        ]);

        Account::create([
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'tiktok' => $this->tiktok,
            'youtube' => $this->youtube,
            'linkedin' => $this->linkedin,
            'user_id' => auth()->user()->id
        ]);

        $this->reload();
        $this->resetFormFields();
    }

    public function edit($id)
    {
        $account = Account::find($id);
        $this->account_id = $account->id;
        $this->facebook = $account->facebook;
        $this->instagram = $account->instagram;
        $this->twitter = $account->twitter;
        $this->tiktok = $account->tiktok;
        $this->youtube = $account->youtube;
        $this->linkedin = $account->linkedin;
    }

    public function update()
    {
        $this->validate([
            'facebook' => 'required',
        ]);
        
        $account = Account::find($this->account_id);
        $account->update([
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'tiktok' => $this->tiktok,
            'youtube' => $this->youtube,
            'linkedin' => $this->linkedin,
            'user_id' => auth()->user()->id
        ]);
        $this->reload();
        $this->resetFormFields();
    }

    public function delete($id)
    {
        $account = Account::find($id);
        $account->delete();

        $this->reload();
        $this->resetFormFields();
    }

    public function reload()
    {
        $this->accounts = Account::all();
    }

    public function resetFormFields()
    {
        $this->account_id = '';
        $this->facebook = '';
        $this->instagram  = '';
        $this->twitter  = '';
        $this->tiktok  = '';
        $this->youtube  = '';
        $this->linkedin  = '';
    }
}
