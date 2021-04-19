<?php 
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

$color = random_color();

$fp=fopen('./generated_project/theme_color.php','w');
fwrite($fp, "<?php \$THEME_COLOR = \"#$color\"; ?>");
fclose($fp);

$rootPath = realpath('./generated_project');

// Initialize archive object
$zip = new ZipArchive();
$zip->open('file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();


header("Content-type: application/zip"); 
header("Content-Disposition: attachment; filename=file.zip");
header("Content-length: " . filesize("file.zip"));
header("Pragma: no-cache"); 
header("Expires: 0"); 
readfile("file.zip");
?>