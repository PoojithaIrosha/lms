<?php

// Sign Out
session_start();
session_destroy(); // Destroy Session
echo "success";
