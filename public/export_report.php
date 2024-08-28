<?php
require '../auth.php';

// Redirect to the backend file for processing
header('Location: ../backend/export_report.php');
exit();
