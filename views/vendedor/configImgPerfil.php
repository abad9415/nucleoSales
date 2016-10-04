<script>
function ver(image){
document.getElementById('image').innerHTML = "<img src='"+image+"'>" 
}
</script>
<form action="sube.php" method="post" enctype="multipart/form-data"> 
    Archivo: <input name="file" type="file"  onChange="ver(form.file.value)">
    <input name="submit" type="submit" value="Upload!">  
</form><br> <span id="image">hola</span> 