<?php
// auth-generated by FilterConfigHandler
// date: 03/02/2020 12:20:56
require_once('D:\phpStudy\WWW\open\app\install\webapp/filter/LoginFilter.class.php');
require_once('D:\phpStudy\WWW\open\app\install\webapp/filter/ThdFilter.class.php');
require_once('D:\phpStudy\WWW\open\app\install\webapp/filter/SedFilter.class.php');
$filters = array();
$filter = new ExecutionTimeFilter();
$filter->initialize($this->context, array('comment' => true));
$filters[] = $filter;
$filter = new LoginFilter();
$filter->initialize($this->context, array('effect' => true));
$filters[] = $filter;
$filter = new ThdFilter();
$filter->initialize($this->context, array('effect' => true));
$filters[] = $filter;
$filter = new SedFilter();
$filter->initialize($this->context, array('effect' => true));
$filters[] = $filter;
$list[$moduleName] =& $filters;
?>