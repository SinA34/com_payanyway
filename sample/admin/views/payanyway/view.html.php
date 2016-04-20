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
	// Устанавливаем панель инструментов.
        $this->addToolBar();
   	// Получаем сообщение из модели.
		$this->item = $this->get('Item');		
	// Отображаем представление.
		parent::display($tpl);
	}
	 /**
     * Устанавливает панель инструментов.
     *
     * @return void
     */
    
	protected function addToolBar() 
    {
		// Get the toolbar object instance
        JToolBarHelper::title(JText::_('Ответы PayAnyWay настройка параметров'), 'payanyway');
		JToolbarHelper::preferences('com_payanyway');
    }
}
