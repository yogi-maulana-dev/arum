<?php

namespace App\Services;

use Xenolope\Quahog\Client;
use Socket\Raw\Factory;

class VirusScanService
{
    /**
     * Scan a file path via ClamAV socket.
     * Returns true if clean, false if infected.
     * Throws on socket/connection failure so callers can handle gracefully.
     */
    public function scan(string $filePath): bool
    {
        $socket = config('services.clamav.socket', '/var/run/clamav/clamd.ctl');
        $host   = config('services.clamav.host', '127.0.0.1');
        $port   = config('services.clamav.port', 3310);

        $factory = new Factory();

        // Try unix socket first, fall back to TCP
        try {
            $connection = file_exists($socket)
                ? $factory->createFromString('unix://' . $socket)
                : $factory->createClient($host . ':' . $port);

            $client = new Client($connection, 30, PHP_NORMAL_READ);
            $result = $client->scanFile($filePath);

            return $result->isOk();
        } catch (\Throwable $e) {
            // ClamAV not available — log and skip
            logger()->warning('ClamAV scan skipped: ' . $e->getMessage());
            throw $e;
        }
    }
}
