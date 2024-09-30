<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public $nama;
    public $email;
    public $password;
    public $re_password;

    public function save()
    {
        $this->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:8|max:255',
            're_password' => 'required|same:password',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 255 karakter',
            're_password.required' => 'Konfirmasi Password wajib diisi',
            're_password.same' => 'Konfirmasi Password harus sama dengan Password',
        ]);

        $user = new \App\Models\User();
        $user->name = $this->nama;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->save();
        $user->assignRole('user');

        Auth::login($user);

        return redirect()->intended();
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
