<?php
declare(strict_types=1);

namespace Dariam\Install\Controller;

use Dariam\Framework\Http\Response\Html;

class Index implements \Dariam\Framework\Http\ControllerInterface
{
    private \Dariam\Framework\Database\Adapter\AdapterInterface $adapter;

    private \Dariam\Framework\Http\Response\Html $html;

    /**
     * @param \Dariam\Framework\Database\Adapter\AdapterInterface $adapter
     * @param \Dariam\Framework\Http\Response\Html $html
     */
    public function __construct(
        \Dariam\Framework\Database\Adapter\AdapterInterface $adapter,
        \Dariam\Framework\Http\Response\Html $html
    ) {
        $this->adapter = $adapter;
        $this->html = $html;
    }

    /**
     * @return Html
     */
    public function execute(): Html
    {
        $connection = $this->adapter->getConnection();

        $this->html->setBody('Testing controller');

        return $this->html;
    }
}