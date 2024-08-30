<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')]

class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();




        $this->redirectIntended(default: route(Auth::user()->getRedirect()), navigate: false);
    }
}; ?>



<div class="main-wrapper account-wrapper">
    <div class="account-page">
        <div class="account-center">
            <div class="account-box">
                <form wire:submit="login" class="form-signin">
                    <div class="account-logo">
                        <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                    </div>

                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <div class="form-group">
                        <label>Username or Email</label>
                        <input type="text" wire:model="form.email" autofocus="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" wire:model="form.password" class="form-control">
                    </div>
                    <div class="text-right form-group">
                        <a href="forgot-password.html">Forgot your password?</a>
                    </div>
                    <div class="text-center form-group">
                        <button type="submit" class="btn btn-primary account-btn">Login</button>
                    </div>
                    <div class="text-center register-link">
                        Don’t have an account? <a href="register.html">Register Now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

