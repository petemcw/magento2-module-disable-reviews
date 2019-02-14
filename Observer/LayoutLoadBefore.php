<?php
/**
 * Disable Product Reviews
 *
 * @copyright Copyright (c) 2019 Peter McWilliams (http://www.petemcw.com)
 * @license MIT License
 * @author Peter McWilliams <petemcw@gmail.com>
 */
namespace Prm\DisableReviews\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Prm\DisableReviews\Api\ConfigInterface;

/**
 * Observer monitoring for `layout_load_before` events.
 */
class LayoutLoadBefore implements ObserverInterface
{
    /**
     * @var \Prm\DisableReviews\Api\ConfigInterface
     */
    protected $config;

    /**
     * Constructor.
     *
     * Initialize class dependencies.
     *
     * @param \Prm\DisableReviews\Api\ConfigInterface $config
     */
    public function __construct(
        ConfigInterface $config
    ) {
        $this->config = $config;
    }

    /**
     * Add custom layout handle that will remove blocks.
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(EventObserver $observer)
    {
        if (!$this->config->isEnabled()) {
            return;
        }

        /** @var \Magento\Framework\View\LayoutInterface $layout */
        $layout = $observer->getData('layout');
        $layout
            ->getUpdate()
            ->addHandle('remove_product_reviews');
    }
}
