<?php
declare(strict_types=1);

namespace Dariam\Framework\Database\Adapter;

interface AdapterInterface
{
    public function getConnection();
}
