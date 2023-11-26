<?php
declare(strict_types=1);

namespace CronCastleDestroyer\Lib\Logger;

use Google\Cloud\Logging\LoggingClient;
use Google\Cloud\Logging\PsrLogger;

// see https://cloud.google.com/logging/docs/setup/php?hl=ja
class CloudLoggingLogger implements LoggerInterface
{
    private static ?CloudLoggingLogger $instance = null;
    private PsrLogger $logger;

    private function __construct(
        string $appName,
    )
    {
        // LXC で動作する API から使うことも想定して Credential を渡す
        $this->logger = LoggingClient::psrBatchLogger($appName, [
            'clientConfig' => [
                'projectId' => GOOGLE_CLOUD_PROJECT_ID,
                'keyFilePath' => GOOGLE_APPLICATION_CREDENTIALS,
            ],
        ]);
    }

    public static function getInstance(
        string $appName = 'app',
    ): CloudLoggingLogger
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($appName);
        }
        return self::$instance;
    }

    public function debug($message, array $context = []): void
    {
        $this->logger->debug($message, $context);
    }

    public function info($message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }

    public function notice($message, array $context = []): void
    {
        $this->logger->notice($message, $context);
    }

    public function warning($message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }

    public function error($message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }

    public function critical($message, array $context = []): void
    {
        $this->logger->critical($message, $context);
    }

    public function emergency($message, array $context = []): void
    {
        $this->logger->emergency($message, $context);
    }
}