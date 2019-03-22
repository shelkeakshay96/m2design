<?php
namespace Angular\Demo\Helper;

class Cookies {
	/**
     * @var \Magento\Framework\Stdlib\CookieManagerInterface
     */
    protected $cookieManager;

    /**
     * @var \Magento\Framework\Stdlib\Cookie\CookieMetadataFactory
     */
    protected $cookieMetadataFactory;

	public function __construct(
		\Magento\Framework\Stdlib\CookieManagerInterface $cookieManager,
        \Magento\Framework\Stdlib\Cookie\CookieMetadataFactory $cookieMetadataFactory
	) {
		$this->cookieManager = $cookieManager;
        $this->cookieMetadataFactory = $cookieMetadataFactory;
	}

	public function setCookie($name, $value, $duration = 60) {
        $metadata = $this->cookieMetadataFactory
            ->createPublicCookieMetadata()
            ->setDuration($duration);

        $this->cookieManager->setPublicCookie($name, $value, $metadata);
    }

    public function getCookie($name) {
        return $this->cookieManager->getCookie($name);
    }

    public function deleteCookies($name) {
        $this->cookieManager->deleteCookie($name);
    }

}
