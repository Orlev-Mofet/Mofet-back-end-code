<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

use DB;
use ZipArchive;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function backup(Request $request) 
    {
        $datetime = date("Y-m-d_H-i-s");

        // Backup the MySQL database
        $backupFileName = "mofet_backup_$datetime.sql";
        $process = new Process(['mysqldump', '-u', env('DB_USERNAME'), '-p'.env("DB_PASSWORD"), env("DB_DATABASE")]);
        $process->run();

        // Check if the backup process was successful
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Store the backup file
        Storage::put($backupFileName, $process->getOutput());

        // Download the backup file
        return Storage::download($backupFileName);
    }

    public function restore(Request $request) 
    {
        // Validate the uploaded file
        $request->validate([
            'sql_file' => 'required|file', // Adjust max file size if needed
        ]);

        // Get the uploaded file
        $sqlFile = $request->file('sql_file');

        // Get the contents of the uploaded file
        $sqlContent = file_get_contents($sqlFile->path());

        // Execute the SQL queries to restore the database
        \DB::unprepared($sqlContent);

        // Redirect back with success message
        return back()->with('success', 'Database restored successfully.');
    }

    public function backup_all(Request $request) 
    {
        $backupPath = 'backups/' . date('Y-m-d-His');
        $sqlFilePath = $backupPath . '_database.sql';
        $zipFilePath = storage_path('app/' . $backupPath . '.zip');
    
        // 1. Backup the database
        $databaseName = env('DB_DATABASE');
        $databaseUser = env('DB_USERNAME');
        $databasePassword = env('DB_PASSWORD');
        $this->backupDatabase($databaseName, $databaseUser, $databasePassword, storage_path('app/' . $sqlFilePath));
    
        // 2. Compress the SQL file and any additional files/directories
        $this->compressFiles($zipFilePath, [$sqlFilePath, 'public']);
    
        // 3. Clean up the SQL file
        Storage::delete($sqlFilePath);
    
        // 4. (Optional) Return download response or store the backup as needed
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

    public function restore_all(Request $request) 
    {

    }

    protected function backupDatabase($databaseName, $databaseUser, $databasePassword, $outputPath)
    {
        $command = sprintf(
            'mysqldump -u %s -p%s %s > %s',
            $databaseUser,
            $databasePassword,
            $databaseName,
            $outputPath
        );

        $process = Process::fromShellCommandline($command);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }

    protected function compressFiles($zipFilePath, array $paths)
    {
        $zip = new \ZipArchive();
        if ($zip->open($zipFilePath, \ZipArchive::CREATE) === TRUE) {
            foreach ($paths as $path) {
                if (is_dir(storage_path('app/' . $path))) {
                    $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(storage_path('app/' . $path)));
                    foreach ($files as $file) {
                        if ($file->isDir()) continue;
                        $filePath = $file->getRealPath();
                        $relativePath = substr($filePath, strlen(storage_path('app/')));
                        $zip->addFile($filePath, $relativePath);
                    }
                } else {
                    Log::debug(["storage_path('app' . path)", storage_path('app/' . $path), $path]);

                    $zip->addFile(storage_path('app/' . $path), basename($path));
                }
            }
            $zip->close();
        } else {
            throw new \Exception("Cannot open the zip file for writing.");
        }
    }

}
