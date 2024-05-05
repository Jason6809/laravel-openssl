<?php

namespace Jason6809\LaravelOpenssl\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Jason6809\LaravelOpenssl\Tests\TestCase;

class GenerateSSLTest extends TestCase
{
    public function the_command_successfully_generate_cert_and_key()
    {
        $this->artisan('openssl:generate')
            ->expectsQuestion('Enter the Common Name (CN) for the SSL certificate.', 'example.test')
            ->expectsQuestion('Enter SAN hostnames. (In comma-separated, e.g: example.com,www.example.com,...)', 'example.test,www.example.test')
            ->expectsOutput('SSL Certificate generated successfully.')
            ->assertExitCode(0);

        $this->assertTrue(file_exists(base_path('example.test.key')));
        $this->assertTrue(file_exists(base_path('example.test.crt')));
    }
}
