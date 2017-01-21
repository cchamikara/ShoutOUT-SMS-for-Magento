<?php
/**
 * ShoutOUT Lite (https://lite.getshoutout.com/).
 *
 * @category    Shoutout
 * @package     Shoutout_Sms
 * @author      Chamal Chamikara <chamalchamikara@gmail.com>
 * @copyright   Copyright (c) 2017 Chamal Chamikara. (http://www.learnmagento.com/)
 */

$installer = $this;
$installer->startSetup();
$installer->run("
    DROP TABLE IF EXISTS {$installer->getTable('sms/history')};
    CREATE TABLE `{$installer->getTable('sms/history')}` (
      `id` int(11) NOT NULL auto_increment,
      `order_id` int(10),
      `order_status` text,
      `mobile_no` int(10),
      `created_at` datetime default NULL,
      `cost` int(10),
      `message` text,
      `sms_status` text,
      PRIMARY KEY  (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");
$installer->endSetup();