<?php
declare(strict_types=1);

namespace CronCastleDestroyer\Job;

use CronCastleDestroyer\Lib\Logger\CloudLoggingLogger;
use CronCastleDestroyer\Process\CronCastleDestroyer;

require __DIR__ . '/../../config.php';

function main($argv): void
{
    $commands = [
        'CronCastleDestroyer' => new CronCastleDestroyer(),
    ];

    $logger = CloudLoggingLogger::getInstance($argv[1] ?? 'CloudRunJob');

    $jobName = $argv[1] ?? null;
    if (!$jobName) {
        $logger->error("Job name is required");
        $logger->error($argv[0] . " [job_name] (--help)");
        exit(1);
    }

    if (!isset($commands[$jobName])) {
        $logger->error("Job name not found, jobName: $jobName");
        exit(1);
    }

    try {
        $logger->info("Start job, jobName: $jobName");
        $commands[$jobName]->run();
        $logger->info("Start job, jobName: $jobName");
    } catch (\Throwable $e) {
        $logger->error($e->getMessage());
        $logger->error($e->getTraceAsString());
        exit(1);
    }
}

main($argv);