// Testar lite - denna kod gör ingenting
if (isset($_POST['submit'])) {
$fruitList = $_POST($data['fruits']);
$data['fruits'] = "";
foreach ($fruitList as $fruit) {
$data['fruits'] .= $fruit . ",";
}
}
// Slut testar lite