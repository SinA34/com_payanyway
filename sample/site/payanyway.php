<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_payanyway
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
  
// Получаем экземпляр контроллера с префиксом payanyway.
$controller = JControllerLegacy::getInstance('payanyway');
 
// Исполняем задачу task из Запроса.
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task', 'display'));
 
// Перенаправляем, если перенаправление установлено в контроллере.
$controller->redirect();
?>