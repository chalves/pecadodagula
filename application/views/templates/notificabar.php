<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dadosLogin = $this->session->userdata('logged_in');
$fotoLogin =  'assets/img/fotos/' . $dadosLogin['fotoUsuario'];     
?>

<ul class="dropdown-menu bg-gray">
  <li class="header bg-blue-active">Você tem 10 notificações</li>
  <li>
    <!-- inner menu: contains the actual data -->
    <ul class="menu">
      <li>
        <a href="#">
          <i class="fa fa-users text-aqua"></i> 5 new members joined today
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
          page and may cause design problems
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-users text-red"></i> 5 new members joined
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-user text-red"></i> You changed your username
        </a>
      </li>
    </ul>
  </li>
  <li class="footer bg-blue-active">
      <div class='footermsg h5 text-center'><a href="#"><h4 class="text-bold text-yellow">Veja mais Notificações</h4></a></div>
  </li>
</ul>
