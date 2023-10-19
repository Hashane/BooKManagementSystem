<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class DatabaseBackup extends Command
{
    protected $signature = 'database:backup-restore';
    protected $description = 'Backup and restore a database using Laravel Sail';

    public function handle()
    {
        $sourceConnection = config('database.connections.mysql'); // Specify your source database connection
        $destinationConnection = config('database.connections.second_mysql'); // Specify your destination database connection

        // Create a temporary backup file within the Laravel Sail container
        $backupFileName = 'backup.sql';
        $backupFilePath = storage_path('app/backups/' . $backupFileName);

        // Execute mysqldump within Sail to create a backup file
        // For mysqldump
        $sourceCommand = sprintf(
            'mysqldump -h %s -P %s -u %s -p%s %s > %s',
            $sourceConnection['host'],
            $sourceConnection['port'],
            $sourceConnection['username'],
            $sourceConnection['password'],
            $sourceConnection['database'],
            $backupFilePath
        );



        exec($sourceCommand);

        // Restore the backup into the destination database within Sail
        // For mysql
        $destinationCommand = sprintf(
            'mysql -h %s -P %s -u %s -p%s %s < %s',
            $destinationConnection['host'],
            $destinationConnection['port'],
            $destinationConnection['username'],
            $destinationConnection['password'],
            $destinationConnection['database'],
            $backupFilePath
        );
        exec($destinationCommand);

        // Clean up the temporary backup file within the Sail container
        unlink($backupFilePath);

        $this->info('Database backup and restore completed.');
    }
}
