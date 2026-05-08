<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kapcsolat</title>
</head>
<body>
    <h1>Kapcsolat</h1>

    <form name="kapcsolat" action="kuldes" onsubmit="return ellenoriz();" method="POST">
        <div>
            <label> <textarea id="szoveg" name="szoveg" cols="40" rows="10"></textarea> Üzenet (kötelező! max. 100 karakter): </label>
            <br/>
            <input id="kuzenet" type="submit" value="Küld">
            <button onclick="ellenoriz();" type="button">Ellenőriz</button>
        </div>
    </form>

</body>
</html>



<script>
    window.onload = function() {
	var kuld = document.getElementById("kuld");
	if (kuld)
		kuld.disabled = true;
};
function ellenoriz() {
	var rendben = true;
	var fokusz = null;

	var szoveg = document.getElementById("szoveg");
	if (szoveg) {
		if (szoveg.value.length==0) {
			rendben = false;
			szoveg.style.background = '#f99';
			fokusz = szoveg;
		} else 
			szoveg.style.background = '#9f9';
	}

	if (fokusz) 
		fokusz.focus();

	var kuld = document.getElementById("kuld");
	if (kuld) 
		kuld.disabled = !rendben;

	return rendben;
}
</script>
