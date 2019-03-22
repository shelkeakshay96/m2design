<?php
namespace Angular\Demo\Model\ResourceModel\Register;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	public function _construct()
	{
		$this->_init('Angular\Demo\Model\Register', 'Angular\Demo\Model\ResourceModel\Register');
	}
}
