<?php
declare(strict_types=1);

namespace CronCastleDestroyer\Lib\Logger;

interface LoggerInterface
{
    // TODO $message を \Stringable で受け取るようにする

    public function debug($message, array $context = []): void;

    public function info($message, array $context = []): void;

    public function notice($message, array $context = []): void;

    public function warning($message, array $context = []): void;

    public function error($message, array $context = []): void;

    public function critical($message, array $context = []): void;

    public function emergency($message, array $context = []): void;
}