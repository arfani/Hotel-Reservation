<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {
  function __construct(){
      parent::__construct();
      // Your own constructor code
			$this->load->model('Rooms_m', 'model');
    }

  function index(){
    $data = array(
    'content' => 'rooms'
    );
    $this->load->view('home/home', $data);
  }

  function room_list(){
    $rooms = $this->model->get_all();

    $no = 1;
    foreach ($rooms as $room){
      echo "<tr>";
      echo        "<td>". $no++ ."</td>";
      echo        "<td>". $room->numb ."</td>";
      echo        "<td>". $room->type ."</td>";
      echo        "<td>". $room->annotation ."</td>";
      echo        "<td class='action-col'>";
      echo          "<button id='room_edit' value='". $room->id ."' class='room_edit btn btn-primary'><span class='octicon octicon-pencil'></span></button>";
      echo          "<a href='#' class='btn btn-danger'><span class='octicon octicon-trashcan'></span></a>";
      echo        "</td>";
      echo      "</tr>";
           }
  }


}
