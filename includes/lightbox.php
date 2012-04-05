<?php
  error_reporting(E_ALL);
    global $folder_src, $des_src;  
    $folder_src = "pics";   // Folder pics
    $des_src = "thumbs";    // Folder thumbs
  function mkthumb($img_src,     // Filename
                   $img_width = "120",   // max. size width
                   $img_height = "120",  // max. size height
                   $folder_src = "pics",  // Folder pics
                   $des_src = "thumbs")     // Folder thumbs
  {
    $image = imagecreatefromjpeg($folder_src."/".$img_src);
    list($src_width, $src_height) = getimagesize($folder_src."/".$img_src);
    if($src_width >= $src_height)
    {
      $new_image_width = $img_width;
      $new_image_height = $src_height * $img_width / $src_width;
    }
    if($src_width < $src_height)
    {
      $new_image_height = $img_width;
      $new_image_width = $src_width * $img_height / $src_height;
    }
    $new_image = imagecreatetruecolor($new_image_width, $new_image_height);
    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_image_width,$new_image_height, $src_width, $src_height);
    imagejpeg($new_image, $des_src."/".$img_src, 100);
    RETURN TRUE;
  }
?>
<!-- generate HTML !-->
<p>
<?php
$allebilder = scandir($folder_src); // Sort A-Z
 
foreach ($allebilder as $bild) {
    $bildinfo = pathinfo($folder_src."/".$bild);
    $size = ceil(filesize($folder_src."/".$bild)/1024);
 
    if ($bild != "." && $bild != ".."  && $bild != "_notes" && $bildinfo['basename'] != "Thumbs.db") {
    if(!file_exists($des_src."/".$bild))
    mkthumb($bild);
    ?>
    
        <a class="gallery" href="<?php echo $bildinfo['dirname']."/".$bildinfo['basename'];?>">
        <img src="<?php echo $des_src."/".$bildinfo['basename'];?>" alt="Vorschau" /></a>
        
<?php
    };
 };
?>
<p>