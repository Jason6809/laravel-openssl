<?php

namespace Jason6809\LaravelOpenssl\Console;

use Illuminate\Console\Command;

class GenerateSSL extends Command
{
    protected $signature = 'openssl:generate';

    protected $description = 'Generates an OpenSSL certificate.';

    public function handle(): void
    {
        // Prompt the user for the Common Name (CN)
        $commonName = $this->ask('Enter the Common Name (CN) for the SSL certificate.');

        // Prompt the user for multiple SAN entries
        $hosts = $this->ask('Enter SAN hostnames. (In comma-separated, e.g: example.com,www.example.com,...)');

        // Split and trim the input string into an array
        $hostsArray = array_map('trim', explode(',', $hosts));

        // Build the SAN string
        $san = array_map(function ($host) {
            return "DNS:$host";
        }, $hostsArray);
        $sanString = implode(',', $san);

        // Use sprintf to build the OpenSSL command
        $command = sprintf(
            'openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout %s -out %s -subj %s -addext %s',
            escapeshellarg("$commonName.key"),
            escapeshellarg("$commonName.crt"),
            escapeshellarg("/CN=$commonName"),
            escapeshellarg("subjectAltName=$sanString"),
        );

        $output = null;
        $resultCode = null;
        exec($command, $output, $resultCode);

        if ($resultCode === 0) {
            $this->info('SSL Certificate generated successfully.');
        } else {
            $this->error('Failed to generate SSL Certificate.');
            foreach ($output as $line) {
                $this->error($line);
            }
        }
    }
}
