<?php

  // uncomment apabila mengakses file secara langsung
  // session_start();

  session_destroy();
  header("Location: /e_meeting/");
  exit();

?>