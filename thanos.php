<?php

$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('.'));
$files = array(); 

foreach ($rii as $file) {
  if ($file->isDir()){ 
    continue;
  }

  if ($file->getFileName() !== 'thanos.php') {
    $files[] = $file->getPathname(); 
  }
}

shuffle($files);

$n = sizeof($files) / 2;

for ($i = 0; $i < $n; $i = $i + 1) {
  echo $files[$i], PHP_EOL;

  unlink($files[$i]);
}
