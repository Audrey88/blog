<?php
namespace App\Controller\Component;
use Cake\Controller\Component;


class UploadComponent extends Component
{

    public function getPicture($upload,$directory,$id)
    {
        $extensions = ['jpg','jpeg','png'];
        $file_extension = explode('.',$upload['name'])[1];
        if(!in_array($file_extension,$extensions))
        {
            return $file_newName = 'default.png';
        }
        // define new file name
        $file_newName = strtolower($directory).'-'.$id.'.'.$file_extension;
        // upload
        $path = WWW_ROOT . 'img/'.strtolower($directory).'/original/' . $file_newName;

        if(move_uploaded_file($upload['tmp_name'], $path))
        {
            $path = WWW_ROOT . 'img/'.strtolower($directory).'/original/' . $file_newName;

            // resize as 500x500
            $new_path = WWW_ROOT . 'img/'.strtolower($directory).'/800x800/' . $file_newName;
            $this->resize_img($path,$file_extension,$new_path,800);

            //resize as 50x50
            $new_path = WWW_ROOT . 'img/'.strtolower($directory).'/100x100/' . $file_newName;
            $this->resize_img($path,$file_extension,$new_path,100);
            return $file_newName;
        }
    }

    function resize_img($imgname,$extension,$filename,$size)
    {
        switch($extension) {
            case "jpeg":
            case "jpg":
                $img_src = imagecreatefromjpeg ($imgname);
                break;
            case "gif":
                $img_src = imagecreatefromgif ($imgname);
                break;
            case "png":
                $img_src = imagecreatefrompng ($imgname);
                break;
        }
            //take the original size
        $true_width = imagesx($img_src);
        $true_height = imagesy($img_src);

        if ($true_width>=$true_height)
        {
            //calculate ratio
            $width=$size;
            $height = ($width/$true_width)*$true_height;
        }
        else
        {
            $width=$size;
            $height = ($width/$true_width)*$true_height;
        }
        //create a virtual image
        $img_des = imagecreatetruecolor($width,$height);
        //make a copy from virtual image
        imagecopyresampled ($img_des, $img_src, 0, 0, 0, 0, $width, $height, $true_width, $true_height);

        // Save the resized image
        switch($extension)
        {
            case "jpeg":
            case "jpg":
                imagejpeg($img_des,$filename);
                break;
            case "gif":
                imagegif($img_des,$filename);
                break;
            case "png":
                imagepng($img_des,$filename);
                break;
        }
    }
}