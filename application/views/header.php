<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Form</title>
     <!--link the bootstrap css file-->
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
     
     <style type="text/css">
     .colbox {
          margin-left: 0px;
          margin-right: 0px;
     }
     </style>
</head>
<body>
<div class="container">
     <div class="row">
          <div class="col-lg-6 col-sm-6">
               <h1>EE-Cloud Asset Managementsss</h1>
          </div>
          <div class="col-lg-6 col-sm-6">
               
               <ul class="nav nav-pills pull-right" style="margin-top:20px">
                    
					<?php if($this->session->userdata('username')) {?>
					<li class="active"><a href="login/logout">Logout <? echo $this->lang->line("date_month");?></a></li>
					<?php 
					} 
					else
					{
					?><li class="active"><a href="#">Login <? echo $this->lang->line("date_month");?></a></li>
					<?php 
					}?>
                    <li><a href="#">Signup</a></li>
					<li><a href="<?php echo base_url(); ?>langswitch/switchLanguage/english">English</a></li>
					<li><a href="<?php echo base_url(); ?>langswitch/switchLanguage/finnish">Finnish</a></li>
               </ul>
               
          </div>
     </div>
</div>
<hr/>