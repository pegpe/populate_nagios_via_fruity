<?php
/*
Fruity - A Nagios Configuration Tool
Copyright (C) 2005 Groundwork Open Source Solutions

This file is not a part of the official fruity suite and released under GPL
It actuelly needs some serious cleanup and beutyfying.
*/

include_once('includes/config.inc');

$status_msg = '';
     if($_POST['request'] == 'add_host' || $_POST['request'] == 'delete_host' ) {
       foreach($_POST as $key=>$value) {
	 $p['host_manage'][trim($key)] = trim($value);
	 print("<!-- " . $key . " = " . $value . " -->\n");
       }
       if($p['host_manage']['address'] == '127.0.0') {
	 //bug somewhere?
	 $p['host_manage']['address'] = '127.0.0.1';
       }
       if($p['host_manage']['address'] == 'localho') {
         //bug somewhere?
         $p['host_manage']['address'] = 'localhost';
       }
       if (($key = array_search('dummy_value', $p['host_manage'])) !== false) {
	 unset($p['host_manage'][$key]);
	 //more php bugs
       }
       // Check for pre-existing host template with same name
       if($fruity->host_exists($p['host_manage']['host_name'])) {
	 if($_POST['request'] == 'add_host'){
	   $status_msg = "A host with that name already exists!";
	 }
	 else {	 
	  if($fruity->host_has_children($_GET['host_id'])) {
                                $status_msg = "Unable to delete Host.  This host has children.";
                        }
                        else {
                                $fruity->delete_host($_GET['host_id']);
                                $status_msg = "Deleted Host.";
                        }
 
	  }
	   
       }
       else {
	 if($p['host_manage']['host_name'] == '' || $p['host_manage']['alias'] == '' || $p['host_manage']['address'] == '') {
	   $addError = 1;
	   $status_msg = "Fields shown are required and cannot be left blank.\n";
	   $status_msg .= "host_name".$p['host_manage']['host_name']."\n";
	   $status_msg .= "alias".$p['host_manage']['alias']."\n";
	   $status_msg .= "address".$p['host_manage']['address']."\n";
	 }
	 else {
	   print_r($p['host_manage']);
	   print 'adding';
	   unset($p['host_manage']["request"]);
	   print_r($p);
	   if($fruity->add_host( $p['host_manage'])) {
	     $tempHostTemplateID = $fruity->return_host_id_by_name($p['host_manage']['host_name']);
	     print "Added host with templateid:".$tempHostTemplateID."\n";
	     print_r($tempHostTemplateID) ;
	   }
	 }
       }
     }
     else {
       print $_POST['request'];
     }

print  $status_msg;
?>