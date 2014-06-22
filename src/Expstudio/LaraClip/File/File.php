<?php namespace Expstudio\LaraClip\File;

use Symfony\Component\HttpFoundation\File\File as SymfonyFile;

class File extends SymfonyFile implements FileInterface
{
	/**
	 * An array of key value pairs for valid image
	 * extensions and their associated MIME types.
	 * 
	 * @var array
	 */
	protected $imageMimes = array(
			'bmp'   => 'image/bmp',
			'gif'   => 'image/gif',
			'jpeg'  => array('image/jpeg', 'image/pjpeg'),
			'jpg'   => array('image/jpeg', 'image/pjpeg'),
			'jpe'   => array('image/jpeg', 'image/pjpeg'),
			'png'   => 'image/png',
			'tiff'  => 'image/tiff',
			'tif'   => 'image/tiff',
		);

	/**
	 * Method for determining whether the uploaded file is
	 * an image type.
	 * 
	 * @return boolean 
	 */
	public function isImage()
	{
		$mime = $this->getMimeType();
		
		// The $imageMimes property contains an array of file extensions and
		// their associated MIME types. We will loop through them and look for 
		// the MIME type of the current SymfonyUploadedFile.
		foreach ($this->imageMimes as $imageMime)
		{
			if (in_array($mime, (array) $imageMime))
			{
				return true;
			}
		}

		return false;
	}
}