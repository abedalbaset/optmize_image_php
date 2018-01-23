<?php
function compress($source, $destination, $quality)
	{

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
	}

function optimizeimg($im_path)
	{
		$imgsize=filesize($im_path)/1024;

		if($imgsize>1000){$ds = compress($im_path, $im_path, 2);}
	    else if($imgsize>600){$ds = compress($im_path, $im_path, 5);}
				else if($imgsize>300){$ds = compress($im_path, $im_path, 9);}
	    		else if($imgsize>250){$ds = compress($im_path, $im_path, 13);}
						else if($imgsize>120){$ds = compress($im_path, $im_path, 25);}
							else {$ds = compress($im_path, $im_path, 50);}

		$datas = file_get_contents($ds);
		$base64s = base64_encode($datas);

		return $base64s;
	}

?>
