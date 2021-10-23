<?php
declare(strict_types=1);

namespace Dariam\Framework\Http;

use Dariam\Framework\Http\Response\Raw;

interface ControllerInterface
{
    public function execute(): Raw;
}
