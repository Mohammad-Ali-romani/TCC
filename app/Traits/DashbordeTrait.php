<?php
namespace App\Traits;

Trait DashbordeTrait
{
    
    // This Methode take File and path(the path u want save file in it) as parameter and save file u send in path and return path(where u save file)
    function saveFile($file,$folder)
    {
        //check if file is null or not
        if($file != null)
        {
            //get file extension 
            $fileExtension= $file->getClientOriginalExtension();

            //$fileNameClient=$file->getClientOriginalName();

            //get file name
            $fileNameClient = pathinfo($file,PATHINFO_FILENAME);

            //file naming
            $fileName=$folder.'\\'.$fileNameClient.'_'.time().'.'.$fileExtension;

            //save file in path u send it as parameter
            $file->move($folder,$fileName);

            return $fileName;
        }

        return null;
       
    }

    //this Methode take file as parameter and retrun file extension
    function fileType($file)
    {
        //check file is null or not
        if($file !=null)
        {
            //get file extension
            $fileExtension =$file->getClientOriginalExtension();
            
            return $fileExtension;
        }
        return null;
    }
    
}