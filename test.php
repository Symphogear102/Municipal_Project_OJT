<!-- <?php
// $brgy = "Binuangan";
// $brgy1 = "Catanghalan";

//   $age = array("001"=>"Binuangan", "002"=>"Catanghalan", "003"=>"Hulo", "004"=>"Lawa", "005"=>"Salambao", 
//   "006"=>"Paco", "007"=>"Pag-Asa", "008"=>"Paliwas", "009"=>"Panghulo", "010"=>"San Pascual", "011"=>"Tawiran");

//   echo array_search("Tawiran" ,$age);
//   $code = array_search($brgy1 ,$age);

//   echo $code;
?> -->

<?php
$person = [
    'first_name' => "Kolade",
    'last_name' => "Chris",
    'likes' => "football and Pro-wrestling",
    'email' => "kolade@gmail.com",
];
// That’s not my email. Don't bother sending me a message.

$newPersonValues = implode(", ", $person)."<br>";
$newPersonKeys = implode(", ", array_keys($person))."<br>";

echo $newPersonKeys."<br>"; 
echo $newPersonValues."<br>";

echo array_search("first_name" ,$person);

$code = array_search('Kolade' ,$person);

echo $code."<br>";

$db_conn = mysqli_connect("localhost", "root", "", "municipal");
$sql = mysqli_query($db_conn,"select name from list");
while($row = mysqli_fetch_array($sql))
{
   $array = unserialize($row["name"]);
   echo print_r($array);
}
?>