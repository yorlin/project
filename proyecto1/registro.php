<?php


$employee = $_REQUEST['index'];

echo $registro['first_name'];
foreach ($registro as $key => $value) {
    echo "$key = $value <br />";
}










?>

<script type="text/javascript"> 
if(confirm('Saved Succesfully, do you want to add another one?')) {
    window.location.href = 'index.html';
}

</script>