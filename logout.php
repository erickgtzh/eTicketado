<?php
session_start();
session_destroy();
header("Location: step1.php");
