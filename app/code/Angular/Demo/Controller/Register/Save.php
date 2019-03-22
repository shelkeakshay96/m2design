<?php
namespace Angular\Demo\Controller\Register;
use \Magento\Framework\Controller\ResultFactory;

class Save extends \Magento\Framework\App\Action\Action {
	const COOKIE_DURATION = 600; // lifetime in seconds

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Angular\Demo\Model\RegisterFactory $registerFactory,
		\Magento\Framework\Message\ManagerInterface $messageManager,
		\Magento\Framework\App\RequestInterface $request,
		\Magento\Framework\Controller\ResultFactory $resultFactory,
		\Angular\Demo\Helper\Cookies $helperCookies
	) {
		$this->registerFactory 	= $registerFactory;
		$this->_messageManager 	= $messageManager;
		$this->request 			= $request;
		$this->resultFactory 	= $resultFactory;
		$this->helperCookies 	= $helperCookies;
		return parent::__construct($context);
	}

	protected function _isAllowed() {
	    return $this->_authorization->isAllowed('Angular_Demo::demo');
	}

	private function getRegistrationModel() {
		return $this->registerFactory->create();
	}

	private function isEmailExist($email) {
		if($email == "") return true;

		$model = $this->getRegistrationModel()->getCollection()->addFieldToFilter('email', $email);

		return (sizeof($model->getData()) == 0) ? false : true;
	}

	public function execute() {
		$post = $this->request->getPostValue();

		foreach ($post as $field_name => $value ) {
			$this->helperCookies->setCookie('m2cookie_'.$field_name, $value, self::COOKIE_DURATION);	
		}

		$model = $this->getRegistrationModel();

		if (empty($post)) {
			$this->_messageManager->addErrorMessage('Error: Cannot resgiter with empty data!');
        }elseif ($this->isEmailExist((isset($post['email'])) ? $post['email'] : "") ) {
			$this->_messageManager->addErrorMessage('Error: There is already an account with this email address!');
        } else {
        	$model->setData($post);
        	try {
        		$model->save();
        		foreach ($post as $field_name => $value ) {
					$this->helperCookies->deleteCookies('m2cookie_'.$field_name);
				}
        		$this->_messageManager->addSuccessMessage('Customer Registered Succesfully!');
        	} catch(\Exception $e) {
        		$this->_messageManager->addErrorMessage('Something went wrong while saving the customer!');
        	}
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl('demo');

        return $resultRedirect;
	}
}
