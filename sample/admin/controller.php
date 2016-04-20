<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

/**
 * Контроллер компонента com_payanyway.
 */
class payanywayController extends JControllerLegacy
{
	protected $default_view = 'payanyway';
    /**
     * Задача по отображению.
     *
     * @param   boolean  $cachable   Если true, то представление будет закешировано.
     * @param   array    $urlparams  Массив безопасных url-параметров и их валидных типов переменных.
     *
     * @return  void
     */
    public function display($cachable = false, $urlparams = false) 
    {
        // Устанавливаем представление по умолчанию, если оно не было установлено.
		parent::display();
    }	
}
