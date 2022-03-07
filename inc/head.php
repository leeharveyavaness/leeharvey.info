<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/css/materialize.css">

<script>
	function currentTime() {
		let date = new Date(); 
		let hh = date.getHours();
		let mm = date.getMinutes();
		let ss = date.getSeconds();
		let session = "AM";

		if(hh == 0){
			hh = 12;
		}
		if(hh > 12){
			hh = hh - 12;
			session = "PM";
		}

		hh = (hh < 10) ? "0" + hh : hh;
		mm = (mm < 10) ? "0" + mm : mm;
		ss = (ss < 10) ? "0" + ss : ss;
    
		let time = hh + ":" + mm + ":" + ss + " " + session;

  		document.getElementById("clock").innerText = time; 
  		let t = setTimeout(function(){ currentTime() }, 1000);
	}

</script>

<script>
	function makeArray() {
		for (i = 0; i < makeArray.arguments.length; i++)
		this[i + 1] = makeArray.arguments[i];
	}

	var months = new makeArray('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec');
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var yy = date.getYear();
	var year = (yy < 1000) ? yy + 1900 : yy;
</script>