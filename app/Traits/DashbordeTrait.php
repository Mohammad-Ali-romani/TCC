<?php
namespace App\Traits;

Trait DashbordeTrait
{
    
    
    function saveFile($file,$folder)
    {
        if($file != null)
        {
            $fileExtension= $file->getClientOriginalExtension();
            $fileNameClient=$file->getClientOriginalName();
            $fileName=$fileNameClient.'_'.time().'.'.$fileExtension;
            $file->move($folder,$fileName);
            return $fileName;
        }
        return null;
       
    }
    function fileType($file)
    {
        if($file !=null)
        {
            $fileExtension =$file->getClientOriginalExtension();
            return $fileExtension;
        }
        return null;
    }
    
}