<?php
defined('_JEXEC') or die;

/**
 * Модель сообщения компонента com_payanyway.
 */
class payanywayModelpayanyway extends JModelItem
{
	/**
	 * Получаем сообщение.
	 *
	 * @return  string  Сообщение, которое отображается пользователю.
	 */
	public function getItem()
	{
		if (!isset($this->_item))
		{
			$this->_item = 'Компонент регистрации уведомлений о проведенной оплате в PayAnyWay';	
		}
		return $this->_item;
	}
}
?>