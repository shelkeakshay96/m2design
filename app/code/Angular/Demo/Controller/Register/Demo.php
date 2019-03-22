<?php
namespace Angular\Demo\Controller\Register;

class Demo extends \Magento\Framework\App\Action\Action {
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory 
	) {
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	protected function _isAllowed() {
	    return $this->_authorization->isAllowed('Angular_Demo::demo');
	}

	public function execute() {
		return $this->_pageFactory->create();
	}
}
