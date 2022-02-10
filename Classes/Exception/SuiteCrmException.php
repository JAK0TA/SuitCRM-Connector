<?php

// Copyright JAKOTA Design Group GmbH. All rights reserved.
declare(strict_types=1);

namespace JAKOTA\SuitecrmConnector\Exception;

class SuiteCrmException extends \Exception {
  public function __construct(string $message, int $code = 0, \Throwable $previous = null) {
    parent::__construct($message, $code, $previous);
  }

  public function __toString(): string {
    return __CLASS__.": [{$this->code}]: {$this->message}\n";
  }
}
