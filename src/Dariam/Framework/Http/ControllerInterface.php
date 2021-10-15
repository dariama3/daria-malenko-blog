<?php
declare(strict_types=1);

namespace Dariam\Framework\Http;

interface ControllerInterface
{
    public function execute(): string;
}
