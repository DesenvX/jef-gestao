<?php

namespace services;

require_once '../../config/Environment.php';

use config\Environment;

class Backup
{

    public function saveDb()
    {
        Environment::load();

        $date = date("dmy_s");
        $path = "C:\Backups_Sys_Jeferson";
        $code = 'C:\AppServ\MySQL\bin\mysqldump -h ' . $_ENV['HOST'] . ' -u ' . $_ENV['USER'] . ' -p' . $_ENV['PASSWORD'] . ' ' . $_ENV['DATABASE'] . ' > ' . $path . '\Backup' . $date . '.sql';

        system($code);

        session_start();
        $_SESSION['backup_success'] = true;
        header("location: ../pages/dashboard.php");
        
    }
}
