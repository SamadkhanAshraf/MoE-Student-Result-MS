<?php

namespace App\Http\Controllers\Admin\Backup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Artisan;
use Log;
use Session;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index(){
        $path = storage_path('app/backups');
        $files = File::allFiles($path);
         $backups = [];
         foreach ($files as $file) {
            $backups[] = [
                'file_path' =>  $file->getPathname(),
                'file_name' =>  $file->getFilename(),
                'file_size' =>  File::size($file->getPathname()),
                'last_modified' => File::lastModified($file->getPathname()),
                'extension' => $file->getExtension(),
                 ];
         }

        $backups = array_reverse($backups);
        return view("admin.backup.index")->with(compact('backups'));
     }



     public function create()
     {
        try {
            /* only database backup*/
            \Artisan::queue('backup:run', ['--only-db' => true,'--disable-notifications'=>true]);
            $output = Artisan::output();
            Log::info("Backpack\BackupManager -- new backup started \r\n".$output);
            session()->flash('success', __('msg.success'));
            return redirect()->route('all-backups');
        } catch (Exception $e) {
            session()->flash('danger', $e->getMessage());
            return redirect()->back();
        }
     }

     public function download($file) {
        $path = storage_path('app/backups/'.$file);
        return response()->download($path);
     }

      public function delete($file){
        $path = storage_path('app/backups/'.$file);
        if(unlink($path)){
            return back()->with('success',__('msg.deleted'));
        }else{
            return back()->with('error',__('msg.failed'));
        }
      }
}
