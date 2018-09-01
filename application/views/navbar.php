<!DOCTYPE html>
<html lang="en">
<head>  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>/assets/css/cv_style.css?=1002">
  <link rel="stylesheet" href="<?=base_url();?>/assets/css/animate?=1001">
</head>
<body >

<div class="container-fluid">
  <br>
  <img src="<?=base_url();?>/assets/img/header.PNG" width="50%">
  <p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="#">Parking</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
  <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          <i class='far fa-address-book fa-2x'></i>
        </a>
        <div class="dropdown-menu">
          <?=anchor("ctrl_admin/sh_admins/","<i class='fas fa-users fa-1x'></i> แสดง admin",array("class"=>"dropdown-item", "data-toggle"=>"tooltip","data-placement"=>"bottom",))?>
          <?=anchor("ctrl_admin/add_admin/","<i class='fas fa-user-plus fa-1x'></i> เพิ่ม admin",array("class"=>"dropdown-item", "data-toggle"=>"tooltip","data-placement"=>"bottom",))?>
          
        </div>
      </li>
<!-- "title"=>"จัดการข้อมูล admin",  <i class="fas fa-school"></i> -->
      <li class="nav-item dropdown">
        <?=anchor("ctrl_admin/select_all/pk_dep/d_id","<i class='fas fa-school fa-2x '></i>",array("class"=>"nav-link","data-toggle"=>"tooltip","data-placement"=>"bottom","title"=>"แผนกวิชา"))?>
      </li>                             
      <li class="nav-item">
        <?=anchor("ctrl_admin/join_pk_std_class_dep_all/pk_users_std/us_id","<i class='fas fa-users fa-2x '></i>",array("class"=>"nav-link","data-toggle"=>"tooltip","data-placement"=>"bottom","title"=>"นักเรียน / นักศึกษา"))?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>