CREATE TABLE IF NOT EXISTS `lkc_pay_mnt` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `MNT_CLIENT_IP` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `MNT_ID` int(20) NOT NULL,
  `MNT_TRANSACTION_ID` varchar(20) NOT NULL,
  `MNT_OPERATION_ID` varchar(20) NOT NULL,
  `MNT_AMOUNT` decimal(10,2) NOT NULL,
  `MNT_CURRENCY_CODE` char(3) CHARACTER SET utf8 NOT NULL,
  `MNT_SUBSCRIBER_ID` int(20) DEFAULT NULL,
  `MNT_TEST_MODE` int(1) DEFAULT NULL,
  `MNT_SIGNATURE` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `MNT_USER` int(20) DEFAULT NULL,
  `MNT_unitId` int(10) DEFAULT NULL,
  `MNT_CORRACCOUNT` int(20) DEFAULT NULL,
  `MNT_CUSTOM1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `MNT_CUSTOM2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `MNT_CUSTOM3` text CHARACTER SET utf8,
  `datereg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
