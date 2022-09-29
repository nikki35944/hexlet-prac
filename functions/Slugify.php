<?php
namespace App\Slugify;

use Funct\Strings;
use Funct\Collection;

function slugify($string)
{
    $result = Strings\Slugify($string);


    var_dump($result);
}




slugify('test');
slugify('test me');
slugify('La La la LA');
slugify('O la      lu');

echo '<pre>';
slugify(''); // ''
slugify('test'); // 'test'
slugify('test me'); // 'test-me'
slugify('La La la LA'); // 'la-la-la-la'
slugify('O la      lu'); // 'o-la-lu'
slugify(' yOu   '); // 'you'
echo '<pre>';