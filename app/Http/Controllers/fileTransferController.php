<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MediaStorage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class fileTransferController extends Controller
{

	public function showUpload()
	{
		return view('upload');
	}

    public function uploadContents(Request $request)
    {
        
        $destinationPath = "uploads";
        $files = $request->file("myFiles");
        $uploadCount = 0;
        $lastFile = MediaStorage::orderBy('id', 'Desc')->take(1)->get()->toArray();
        

        $fileCount = count($files);
        foreach($files as $file)
        {

            $uploadCount++;

            if(count($lastFile) === 0)
            {

                $fileName = strval(count($lastFile) + 1) . "_" .$file->getClientOriginalName();
                $uploadSuccess = $file->move($destinationPath, $fileName);
                
                MediaStorage::create([
                    "filename" => $file->getClientOriginalName(),
                    "filesize" => $file->getSize(),
                    "filelocation" => "/" . $destinationPath . "/" . $fileName,
                    "ip" => $this->getIP(),
                    "isDeleted" => false
                ]);

                $lastFile = MediaStorage::orderBy('id', 'Desc')->take(1)->get()->toArray();



            } else {
                $fileName =  ++$lastFile[0]['id'] . "_" . $file->getClientOriginalName();
                $uploadSuccess = $file->move($destinationPath, $fileName);

                MediaStorage::create([
                    "filename" => $file->getClientOriginalName(),
                    "filesize" => $file->getSize(),
                    "filelocation" => "/" . $destinationPath . "/" . $fileName,
                    "ip" => $this->getIP(),
                    "isDeleted" => false
                ]);
                
            }           
        }
        return view('uploadSuccessful', compact('uploadCount'));
	//should fix something with redirect with var        
    }


    public function successfulUpload()
    {
    	
	    return view('uploadSuccessful');

    }

    public function showDownloads()
    {
    	
    	$data = MediaStorage::where('isDeleted', '=', 0)->orderBy('id','desc')->get()->toArray();
    	
         
    	return view('downloads', compact('data'));
    }

    private function getIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } 
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    private function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
	}   
}
