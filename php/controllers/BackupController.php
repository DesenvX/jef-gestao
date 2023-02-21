<?php
require_once '../services/Backup.php';

use services\Backup;

$backup = new Backup();

return $backup->saveDb();