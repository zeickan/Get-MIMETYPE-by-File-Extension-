<?php

/*
 *
 * EXAMPLE
 *
 */

include "class.mime.php";

$foo = new MIMETYPES;

/* ->file : Filename extension, filename.extension */
$foo->file = "filename.ext";

/* getMIMEType() return true or false */

$foo->getMIMEType();

/* if method getMIMEType is true */
/* Default mimetype (Not found extension) is application/octet-stream */

$bar = $foo->mimetype;


# echo $bar;