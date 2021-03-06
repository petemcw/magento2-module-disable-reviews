<?php
/**
 * Disable Product Reviews
 *
 * @copyright Copyright (c) 2019 Peter McWilliams (http://www.petemcw.com)
 * @license MIT License
 * @author Peter McWilliams <petemcw@gmail.com>
 */

\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'Prm_DisableReviews',
    __DIR__
);
