<?php
#-------------------------------------------------------------
#
# the input field name for file upload should be file
# pass the $FILE Global Variable here....
#
#-------------------------------------------------------------

function supported_image_formats(array $extra = [])
{
  $supported_img_formats = array("image/jpeg","image/png","image/gif");
  if($extra){
    $supported_img_formats = array_merge($supported_img_formats, $extra);
  }
  return $supported_img_formats;
}

function image_thubnil_create(array $FILE, $filepath, $filepath_thumb) {

  $filetmp = $FILE["file"]["tmp_name"];

  #$filename = $FILE["file"]["name"];

  #below two are for chanig the name of that image...
  $temp     = explode(".", $FILE["file"]["name"]);
  $filename = round(microtime(true)) . '.' . end($temp);

  $filetype = $FILE["file"]["type"];
  $filesize = $FILE["file"]["size"];
  $fileinfo = getimagesize($FILE["file"]["tmp_name"]);
  $filewidth = $fileinfo[0];
  $fileheight = $fileinfo[1];
  $filepath .= $filename;
  $filepath_thumb .= $filename;

  if($filetmp == "")
  {
     #echo "please select a photo";
     set_flush(TRUE, "col-md-offset-3 col-md-4", "info", "please select a photo");
     redirect(ADMIN_FOLDER_NAME."/profile/change_profile_picture.php");
  }
  else
  {

     if($filesize > 10097152)
     {
        #echo "photo > 10mb";
        set_flush(TRUE, "col-md-offset-3 col-md-4", "info", "photo > 10mb");
        redirect(ADMIN_FOLDER_NAME."/profile/change_profile_picture.php");
     }
     else
     {

        if($filetype != "image/jpeg" && $filetype != "image/png" && $filetype != "image/gif")
        {
          #echo "Please upload jpg / png / gif";
          set_flush(TRUE, "col-md-offset-3 col-md-4", "info", "Please upload jpg / png / gif");
          $this->redirect(ADMIN_FOLDER_NAME."/profile/change_profile_picture.php");

        }
        else
        {
            try{
                move_uploaded_file($filetmp,$filepath);
            } catch(exception $e){
                echo "image Upload Error ".$e;
            }
           if($filetype == "image/jpeg")
           {
             $imagecreate = "imagecreatefromjpeg";
             $imageformat = "imagejpeg";
           }
           if($filetype == "image/png")
           {
             $imagecreate = "imagecreatefrompng";
             $imageformat = "imagepng";
           }
           if($filetype == "image/gif")
           {
             $imagecreate= "imagecreatefromgif";
             $imageformat = "imagegif";
           }

           $new_width = "400";
           $new_height = "400";

           $image_p = imagecreatetruecolor($new_width, $new_height);
           $image = $imagecreate($filepath); //photo folder

           imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $filewidth, $fileheight);
           $imageformat($image_p, $filepath_thumb);//thumb folder

          /* echo "<br/>";
           echo $filename;
           echo "<br/>";
           echo $filepath;
           echo "<br/>";
           echo $filetype;*/

          $img_path ="assests/photos/thumbs/".$filename;

          #delete the original file...

          unlink($filepath);

          //echo "<img src='".$img_path."'>";

          return $img_path;
        }

     }
  }

}

function ms_office_or_pdf_or_text_file_upload($FILE, $folder_name = "assests/files/") {

    $support_formate = array('doc','dot','docx','dotx','docm','dotm','xls','xlt','xla','xlsx','xltx','xlsm','xltm','xlam','xlsb','ppt','pot','pps','ppa','pptx','potx','ppsx','ppam','pptm','potm','ppsm','txt','pdf');

    $filetmp = $FILE["file"]["tmp_name"];

    #below two are for chanig the name of that image...
    $filetype = $FILE["file"]["name"];
    $filetype = pathinfo($filetype, PATHINFO_EXTENSION);
    $filename = round(microtime(true)) . '.' . $filetype;

    #file save path
    $filepath = $folder_name.$filename;

    #checking if empty file ...

    if($filetmp == "") {

       #echo "please select a photo";
       set_flush(TRUE, "col-md-offset-3 col-md-4", "info", "please select a File");

       redirect("self");

    } else {

      if(!in_array($filetype, $support_formate)) {

        set_flush(TRUE, "col-md-offset-3 col-md-4", "info", "Please upload a Valid File !");

        redirect("self");

      } else {

        //file is a valid file ....

        move_uploaded_file($filetmp,$filepath);

        return $filepath;

      }

    }

}
# this is a function for upload file.
function bulk_file_upload(array $mult_arr, $save_path){
    $total_file = @count($mult_arr['name']);
    for($i = 0; $i < $total_file; $i++) {
      $unique_name = round(microtime(true)) . '-' . $mult_arr['name'][$i];
      $target = $save_path.$unique_name;
      move_uploaded_file($mult_arr['tmp_name'][$i],$target);
      chmod($target, 0777);
      # skip the APP_ROOT form the path for database save
      $target = str_replace(APP_ROOT.'/','' , $target);
      $return_arr[] = $target;
    }

    return $return_arr;
}

# Here We Pass It This Way ...
# $_FILE["file"] if input field name is file
# $_FILE["img"] if Input field Name is img
# It will Rewturn The Upload Path it Uploaded ...

function single_file_upload($FILE, $save_path, array $supported_file_type = [])
{
  if($supported_file_type){
    $filetype = $FILE["type"];
    if( !in_array($filetype, $supported_file_type) ){
      default_failed_flash("  Uploaded File Type Is not Supported !");
      redirect("self");
    }
  }
    $unique_name = round(microtime(true)) . '-' . $FILE['name'];
    $target = $save_path.$unique_name;
    move_uploaded_file($FILE['tmp_name'],$target);
    chmod($target, 0777);

    #---------------------------------------------

    # Remove the Absulate File Path Form the Url
    # If you need the Absulate Path then Append
    #  Where it Needed Or Append the Apsulate Url
    # Where You Need it ...
    $target =  str_replace(APP_PATH."/", "", $target);

    # return the File path
    return $target;
}


/**
| ----------------------------------------------------
| This Helper Function is Wrapper Helper to help
| The Upload image and if it is Update Then It will
| Also help to delete The previous File form Storage
| That is no longer usage by the System
| It just Set The Img to The Gloabl $_POST
| @ return void
| ----------------------------------------------------
**/
function img_file_upload_wrapper(array $file_arr, $upload_path, $post_arr_key_name, $old_file_to_delete = false)
{
    # Delete the Old File Form THe Storage...
    if( $old_file_to_delete ){
        @unlink(APP_PATH."/".$old_file_to_delete);
    }

    $img_path = single_file_upload($file_arr, $upload_path,  supported_image_formats());

    # append The Image Path To the Array ....
    $_POST[$post_arr_key_name] = $img_path;
}


function file_download($name='', $file_path=''){
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$name");
    readfile($file_path);
    exit();
}