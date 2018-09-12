<!DOCTYPE html>
<html lang="en">
<head>  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>/assets/css/bootstrap.min.css?=1001"> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?=base_url();?>/assets/css/cv_style.css?=1005">
  <link rel="stylesheet" href="<?=base_url();?>/assets/css/animate.css?=1001">
  <style type="text/css"> 
  body{background-color: #f7f7f7;}
    .bg-cv{background-color:#25651c!important}
    a.bg-cv:focus,
    a.bg-cv:hover,
    button.bg-cv:focus,
    button.bg-cv:hover{background-color:#12a233!important}
  </style>
</head>
<body >

<div class="container-fluid">
  <br>
  <img src="<?=base_url();?>/assets/img/header.PNG" width="50%">
  <p>
</div>

<nav class="navbar navbar-expand-sm bg-cv navbar-dark sticky-top">
  <a class="navbar-brand" href="<?=base_url()?>ctrl_admin">Parking</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
  <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          ข้อมูล admin
          <i class='far fa-address-book fa-2x'></i>
        </a>
        <div class="dropdown-menu">
          <?=anchor("ctrl_admin/sh_admins/","<i class='fas fa-users fa-1x'></i> แสดง admin",array("class"=>"dropdown-item", "data-toggle"=>"tooltip","data-placement"=>"bottom",))?>
          <?=anchor("ctrl_admin/add_admin/","<i class='fas fa-user-plus fa-1x'></i> เพิ่ม admin",array("class"=>"dropdown-item", "data-toggle"=>"tooltip","data-placement"=>"bottom",))?>
          
        </div>
      </li>
<!-- "title"=>"จัดการข้อมูล admin",  <i class="fas fa-school"></i> -->
      <li class="nav-item dropdown">
        <?=anchor("ctrl_admin/select_all/pk_dep/d_id","แผนกวิชาและกลุ่มการเรียน <i class='fas fa-school fa-2x '></i>",array("class"=>"nav-link","data-toggle"=>"tooltip","data-placement"=>"bottom","title"=>"แผนกวิชาและกลุ่มการเรียน"))?>
      </li>                             
      <li class="nav-item">
        <?=anchor("ctrl_admin/pk_users_std/pk_users_std/us_id","นักเรียน / นักศึกษา <i class='fas fa-users fa-2x '></i>",array("class"=>"nav-link","data-toggle"=>"tooltip","data-placement"=>"bottom","title"=>"นักเรียน / นักศึกษา"))?>
      </li>
      <li class="nav-item">
        <?=anchor("ctrl_admin/pk_machine","ข้อมูลรถ <i class='fas fa-car fa-2x '></i>",array("class"=>"nav-link","data-toggle"=>"tooltip","data-placement"=>"bottom","title"=>"ข้อมูลรถ"))?>
      </li> 
    </ul>
  <div class="navbar-collapse collapse justify-content-center order-2" id="collapsibleNavbar">
    <?=form_open("ctrl_admin/".$fnc,array("class"=>"form-inline justify-content-center")); ?>

        <input class="form-control mr-sm-2" type="search" placeholder="<?=$label?>" name="txt_search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
    </form>
  </div>
  <div class="navbar-collapse collapse justify-content-right order-2" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <?=anchor("ctrl_admin/sh_admin/".$this->session->userdata('ad_id'),$this->session->userdata('ad_name').$this->session->userdata('ad_status')." <i class='fas fa-user-tie fa-2x'></i>",array("class"=>"nav-link","data-toggle"=>"tooltip","data-placement"=>"bottom","title"=>"ออกจากระบบ"))?>
      </li>  
      <li class="nav-item ">
        <?=anchor("ctrl_admin/logout","<i class='fas fa-sign-out-alt fa-2x '></i>",array("class"=>"nav-link","data-toggle"=>"tooltip","data-placement"=>"bottom","title"=>"ออกจากระบบ"))?>
      </li>  
    </ul>
  </div>
  </div>  
</nav>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>