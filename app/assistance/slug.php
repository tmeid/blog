<?php
// function toSlug($title){
//     $title = strtolower($title);
//     $title = trim($title);
//     $accented = [
//         'à' => 'a',
//         'á' => 'a',
//         'ạ' => 'a',
//         'ả' => 'a',
//         'ã' => 'a',
//         'â' => 'a',
//         'ầ' => 'a',
//         'ấ' => 'a',
//         'ậ' => 'a',
//         'ẩ' => 'a',
//         'ẫ' => 'a',
//         'ă' => 'a',
//         'ằ' => 'a',
//         'ắ' => 'a',
//         'ặ' => 'a',
//         'ẳ' => 'a',
//         'ẵ' => 'a',

//         'è' => 'e',
//         'é' => 'e',
//         'ẹ' => 'e',
//         'ẻ' => 'e',
//         'ẽ' => 'e',
//         'ê' => 'e',
//         'ề' => 'e',
//         'ế' => 'e',
//         'ệ' => 'e',
//         'ể' => 'e',
//         'ễ' => 'e',
//         'ì' => 'i',
//         'í' => 'i',
//         'ị' => 'i',
//         'ỉ' => 'i',
//         'ĩ' => 'i',
       
//         'ò' => 'o',
//         'ó' => 'o',
//         'ọ' => 'o',
//         'ỏ' => 'o',
//         'õ' => 'o',
//         'ô' => 'o',
//         'ồ' => 'o',
//         'ố' => 'o',
//         'ộ' => 'o',
//         'ổ' => 'o',
//         'ỗ' => 'o',
//         'ơ' => 'o',
//         'ờ' => 'o',
//         'ớ' => 'o',
//         'ợ' => 'o',
//         'ở' => 'o',
//         'ỡ' => 'o',

//         'ù' => 'u',
//         'ú' => 'u',
//         'ụ' => 'u',
//         'ủ' => 'u',
//         'ũ' => 'u',
//         'ư' => 'u',
//         'ừ' => 'u',
//         'ứ' => 'u',
//         'ự' => 'u',
//         'ử' => 'u',
//         'ữ' => 'u',

//         'ỳ' => 'y',
//         'ý' => 'y',
//         'ỵ' => 'y',
//         'ỷ' => 'y',
//         'ỹ' => 'y',

//         'đ' => 'd'
//     ];
//     $reg = '/[^a-z0-9\s+]/um';

//     // $matches holds all acciented characters (including () characters)
//     // $matches: array
//     preg_match_all($reg, $title, $matches);

//     var_dump($matches);
//     foreach($matches as $i => $char){
       
//         // $title = str_replace($char, $accented[$char], $title);
//         // var_dump($char) ;
//     }
//     // return $matches;

   
// }
// toSlug("Huỳnh Thị  (1997)");

function remove_accent($str)
{

  $a = ['à', 'á', 'ạ', 'ả', 'ã', 'â', 'ầ', 'ấ', 'ậ', 'ẩ', 'ẫ', 'ă', 'ằ', 'ắ', 'ặ', 'ẳ', 'ẵ', 'è', 'é', 'ẹ', 'ẻ', 'ẽ', 'ê', 'ề', 'ế', 'ệ', 'ể', 'ễ', 'ì', 'í', 'ị', 'ỉ', 'ĩ', 'ò', 'ó', 'ọ', 'ỏ', 'õ', 'ô', 'ồ', 'ố', 'ộ', 'ổ', 'ỗ', 'ơ', 'ờ', 'ớ', 'ợ', 'ở', 'ỡ', 'ù', 'ú', 'ụ', 'ủ', 'ũ', 'ư', 'ừ', 'ứ', 'ự', 'ử', 'ữ', 'ỳ', 'ý', 'ỵ', 'ỷ', 'ỹ', 'đ'];
  $b = ['a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'y', 'y', 'y', 'y', 'y', 'd'];
  return str_replace($a, $b, $str);
}

function create_slug($str)
{
  return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),
  array('', '-', ''), remove_accent($str)));
}
