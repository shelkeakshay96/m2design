<?php
namespace Angular\Demo\Model;
class Register extends \Magento\Framework\Model\AbstractModel
{
	public function _construct()
	{
		$this->_init('Angular\Demo\Model\ResourceModel\Register');
	}
}
