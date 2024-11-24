<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get('/login')
            ->assertSeeText("Login");
    }

    public function testLoginPageForMember()
    {
        $this->withSession([
            "user" => "Achmad",
        ])->get('/login')
            ->assertRedirect('/');
    }

    public function testLoginSuccess()
    {
        $this->post('/login', [
            "user" => "Achmad",
            "password" => "ikbal"
        ])->assertRedirect("/")
            ->assertSessionHas("user", "Achmad");
    }

    public function testLoginForUserAlready()
    {
        $this->withSession([
            "user" => "Achmad",
        ])->post('/login', [
            "user" => "Achmad",
            "password" => "ikbal"
        ])->assertRedirect("/");
    }

    public function testLoginValidationError()
    {
        $this->post("/login", [])
            ->assertSeeText("User or Password is Required");
    }

    public function testLoginFailed()
    {
        $this->post('/login', [
            'user' => 'wrong',
            'password' => 'wrong',
        ])->assertSeeText("user or Password Wrong");
    }

    public function testLogout()
    {
        $this->withSession([
            "user" => "Achmad"
        ])->post('/logout')
            ->assertRedirect("/")
            ->assertSessionMissing("user");
    }

    public function testLogoutGuest()
    {
        $this->post('/logout')
            ->assertRedirect("/login");
    }
}
