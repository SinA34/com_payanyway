<?php
defined('_JEXEC') or die;

/**
 * HTML представление сообщения компонента payanyway.
 */
class payanywayViewpayanyway extends JViewLegacy
{
	/**
	 * Сообщение.
	 *
	 * @var  string
	 */
	protected $item;

	/**
	 * Переопределяем метод display класса JViewLegacy.
	 *
	 * @param   string  $tpl  Имя файла шаблона.
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		// Получаем сообщение из модели.
		$this->item = $this->get('Item');
		// Отображаем представление.
		parent::display($tpl);
		exit;
	}
}
