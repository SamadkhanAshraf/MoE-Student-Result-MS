<?php
namespace App\Helpers;


class Helper{

    // Uploding file
    public static function uploadImage($file,$directoryName){
     if($file){
            $path= "uploads/".$directoryName;
            $fileEx = $file->getClientOriginalextension();
            $name= pathinfo($file->getClientOriginalname(),PATHINFO_FILENAME);
            $fileName= date('Y-m-d-H-m-i').'__'.$name.'.'.$fileEx;
            $file-> move(public_path($path), $fileName);
            return $path."/".$fileName;
     }

}

     // Updating uploaded file
     public static function updateImage($file,$oldFile,$directoryName){
          if($file){
               if(file_exists($oldFile)){

                
               }

               $path= "uploads/".$directoryName;
               $fileEx = $file->getClientOriginalextension();
               $name= pathinfo($file->getClientOriginalname(),PATHINFO_FILENAME);
               $fileName= date('Y-m-d-H-m-i').'__'.$name.'.'.$fileEx;
               $file-> move(public_path($path), $fileName);
               return $path."/".$fileName;
          }
     }


     // Deleting File

     public static function deleteImage($oldFile){
        if(file_exists($oldFile)){
            return \File::delete($oldFile);
        }
     }

     public static function deleteFile($oldFile){
          if(file_exists('uploads/'.$oldFile)){
          return \File::delete("uploads/".$oldFile);
          }
     }


     // Converting file to human redable
     public static function humanFileSize($size,$unit="") {
          if( (!$unit && $size >= 1<<30) || $unit == "GB")
               return number_format($size/(1<<30),2)."GB";
          if( (!$unit && $size >= 1<<20) || $unit == "MB")
               return number_format($size/(1<<20),2)."MB";
          if( (!$unit && $size >= 1<<10) || $unit == "KB")
               return number_format($size/(1<<10),2)."KB";
          return number_format($size)." bytes";
     }


     // Human Date format

     public static function humanDateFormat($date){
          return \Carbon\Carbon::parse($date)->diffForHumans();
     }

}


?>
