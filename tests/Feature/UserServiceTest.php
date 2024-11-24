<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\UserServicesImpl;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        // Pastikan binding di Service Provider sudah benar
        $this->userService = $this->app->make(UserService::class);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login("Achmad", "ikbal"));
    }
    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login("tama", "tama"));
    }
    public function testLoginPasswordWrong()
    {
        self::assertFalse($this->userService->login("Achmad", "tama"));
    }
}
