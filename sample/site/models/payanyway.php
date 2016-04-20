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
		$params = JFactory::getApplication()->getParams();
		$input = JFactory::getApplication()->input;
		$action = $input->getCmd('action', '');
		switch ($action) 
		{
		case 'pays_am':
			$pay_mnt = $input->getArray(array(
				'MNT_ID' => 'string',
				'MNT_TRANSACTION_ID' => 'string',
				'MNT_OPERATION_ID' => 'string',
				'MNT_AMOUNT' => 'string',
				'MNT_CURRENCY_CODE' => 'string',
				'MNT_SUBSCRIBER_ID' => 'int',
				'MNT_TEST_MODE' => 'int',
				'MNT_SIGNATURE' => 'string',
				'MNT_USER' => 'string',
				'paymentSystem.unitId' => 'int',
				'MNT_CORRACCOUNT' => 'string',
				'MNT_CUSTOM1' => 'string',
				'MNT_CUSTOM2' => 'string',
				'MNT_CUSTOM3' => 'string'				
				));
			
			if (isset($pay_mnt['MNT_ID']) && isset($pay_mnt['MNT_TRANSACTION_ID']) && isset($pay_mnt['MNT_OPERATION_ID']) 
				&& isset($pay_mnt['MNT_AMOUNT']) && isset($pay_mnt['MNT_CURRENCY_CODE']) && isset($pay_mnt['MNT_TEST_MODE']))
			{
			$dataintegritycode = htmlspecialchars($params->get('mntdataintegritycode'));
//	Проверка подписи сообщения включена?	
			if(htmlspecialchars($params->get('signature_on')))
			{
				$check_pay_crc = False;
				if (isset($pay_mnt['MNT_SIGNATURE']))
				{	
					$par_req = '';
					$par_req .= $pay_mnt['MNT_ID'] . $pay_mnt['MNT_TRANSACTION_ID'];
					$par_req .= $pay_mnt['MNT_OPERATION_ID'];
					$par_req .= $pay_mnt['MNT_AMOUNT'];
					$par_req .= $pay_mnt['MNT_CURRENCY_CODE'];
					$par_req .= isset($pay_mnt['MNT_SUBSCRIBER_ID']) ? $pay_mnt['MNT_SUBSCRIBER_ID'] : '';
					$par_req .= $pay_mnt['MNT_TEST_MODE'];
					$signature = md5($par_req . $dataintegritycode);
					$check_pay_crc = (strcasecmp($signature, $pay_mnt['MNT_SIGNATURE'] ) == 0) ? True : False;
				}
				else $check_pay_crc = False;
			}
			else $check_pay_crc = True;
		
			if ($check_pay_crc)
			{
		
// Добавление данных оплаты в базу сайта
// Формирование объекта $data_pay_mnt:
				$data_pay_mnt = new stdClass();
				$data_pay_mnt->MNT_CLIENT_IP = (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
				$data_pay_mnt->MNT_ID = $pay_mnt['MNT_ID'];
				$data_pay_mnt->MNT_TRANSACTION_ID = $pay_mnt['MNT_TRANSACTION_ID'];	
				$data_pay_mnt->MNT_OPERATION_ID = $pay_mnt['MNT_OPERATION_ID'];
				$data_pay_mnt->MNT_AMOUNT = $pay_mnt['MNT_AMOUNT'];	
				$data_pay_mnt->MNT_CURRENCY_CODE = $pay_mnt['MNT_CURRENCY_CODE'];
				$data_pay_mnt->MNT_SUBSCRIBER_ID = $pay_mnt['MNT_SUBSCRIBER_ID'];
				$data_pay_mnt->MNT_TEST_MODE = $pay_mnt['MNT_TEST_MODE'];
				$data_pay_mnt->MNT_SIGNATURE = $pay_mnt['MNT_SIGNATURE'];	
				$data_pay_mnt->MNT_USER = $pay_mnt['MNT_USER'];	
				$data_pay_mnt->MNT_unitId = $pay_mnt['paymentSystem.unitId'];
				$data_pay_mnt->MNT_CORRACCOUNT = $pay_mnt['MNT_CORRACCOUNT'];
				$data_pay_mnt->MNT_CUSTOM1 = $pay_mnt['MNT_CUSTOM1'];
				$data_pay_mnt->MNT_CUSTOM2 = $pay_mnt['MNT_CUSTOM2'];
				$data_pay_mnt->MNT_CUSTOM3 = $pay_mnt['MNT_CUSTOM3'];

				if(JFactory::getDbo()->insertObject('#__pay_mnt', $data_pay_mnt))
// Вывод ответа	
				{
					$this->_item = 'SUCCESS';	
				}
				else
				{
					$this->_item = 'FAIL';
				}
/**
				$this->_item .= "<br />zakaz N ".$data_pay_mnt->MNT_TRANSACTION_ID." summa: ".$data_pay_mnt->MNT_AMOUNT;
				$this->_item .= "<br />КОД ПРОВЕРКИ ЦЕЛОСТНОСТИ ДАННЫХ".$dataintegritycode;
				$this->_item .= "<br />IP адрес поставщика информации :".$data_pay_mnt->MNT_CLIENT_IP;
**/				
				unset($data_pay_mnt, $pay_mnt);
			}
			else
			{
				$this->_item = 'FAIL';
//				$this->_item .= "<br />signature :".$signature;
			}
		
			}
			else
			{$this->_item = 'FAIL';}			
		break;
		default:
			$this->_item = 'FAIL';	
		}
		}
		return $this->_item;
	}
}
?>