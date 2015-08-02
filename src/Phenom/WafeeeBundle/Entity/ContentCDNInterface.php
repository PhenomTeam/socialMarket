<?php
/**
 * Created by PhpStorm.
 * User: manhtoan
 * Date: 8/1/15
 * Time: 12:22 PM
 */

namespace Phenom\WafeeeBundle\Entity;


interface ContentCDNInterface
{

    public function uploadFile($adapter);

    public function deleteFile($adapter);

    public function getFile();
}