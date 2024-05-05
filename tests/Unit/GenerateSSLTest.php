<?php

namespace Jason6809\LaravelOpenssl\Tests\Unit;

use Jason6809\LaravelOpenssl\Tests\TestCase;

class GenerateSSLTest extends TestCase
{
    /** @test */
    public function generate_ssl()
    {
        if (file_exists('example.test.key')) {
            unlink('example.test.key');
        }

        if (file_exists('example.test.crt')) {
            unlink('example.test.crt');
        }

        $this->artisan('openssl:generate')
            ->expectsQuestion('Enter the Common Name (CN) for the SSL certificate.', 'example.test')
            ->expectsQuestion('Enter SAN hostnames. (In comma-separated, e.g: example.com,www.example.com,...)', 'example.test,www.example.test')
            ->assertExitCode(0);

        $this->assertTrue(file_exists('example.test.key'));
        $this->assertTrue(file_exists('example.test.crt'));

        if (file_exists('example.test.key')) {
            unlink('example.test.key');
        }

        if (file_exists('example.test.crt')) {
            unlink('example.test.crt');
        }
    }
}
