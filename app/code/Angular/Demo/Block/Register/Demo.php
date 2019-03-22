<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Angular\Demo\Block\Register;

/**
 * Customer reset password form
 *
 * @api
 * @since 100.0.2
 */
class Demo extends \Magento\Framework\View\Element\Template
{
	/**
     * @var \Magento\Framework\Stdlib\CookieManagerInterface
     */
    protected $cookieManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Angular\Demo\Helper\Cookies $helperCookies,
        array $data = []
    )
    {
        $this->helperCookies = $helperCookies;
        parent::__construct($context, $data);
    }

    public function getCookieHelper() {
        return $this->helperCookies;
    }
}
