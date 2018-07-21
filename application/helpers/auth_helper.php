<?php

function isOp(){
  $CI = & get_instance();
  if($CI->session->userdata('l') != 'operator' && $CI->session->userdata('l') != 'administrator'){
    redirect(base_url());
  }
}

function isAd(){
  $CI = & get_instance();
  if($CI->session->userdata('l') != 'administrator'){
    redirect(base_url());
  }
}
