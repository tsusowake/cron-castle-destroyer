<?php
declare(strict_types=1);

namespace CronCastleDestroyer\Process;

use CronCastleDestroyer\Lib\Logger\CloudLoggingLogger;

final class CronCastleDestroyer
{
    public function run(): void
    {
        $logger = CloudLoggingLogger::getInstance('CronCastleDestroyer');
        $logger->debug("[DEBUG] CronCastleDestroyer: ");
    }
}