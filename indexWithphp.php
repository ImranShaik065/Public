
<html>
<head>
 <title>APIsec Free Pentest report</title>
<style>
input[type=text]  {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=text]  {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #e95545;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
h1{
	text-align: center;
	color: #a8a8a8;
   text-shadow(1px 1px 0 rgba(white, 1));
	}
input[type=submit]:hover {
  background-color: #e95545;
}

.apisec {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin: 0 auto;
  width: 400px;
}
</style>
<script>
$("input:radio").change(function() {
    $(".types").hide();
    $(this).next("input").show();
});
    
</script>

</head>
<body>

<h1>APIsec Free API Security assessment report</h1>
  <div class="apisec">
     <form class="form" method="post" id="myForm" action="<?php $_PHP_SELF ?>">
	 <label for="work email"><b>Work Email</b></label>
    <input type="text" id="email" name="email" placeholder="work email">
		<label for="OAS"><b>Open API Spec</b></label>
    <input type="text" id="openAPISpec" name="openAPISpec" placeholder="openAPISpec">
	      <input type="submit" value="Submit">  		  
    </form>
   </div>
	  <div id="json_response"></div>

</body>

<?php	

		if(isset($_POST['submit']))
		
		if($_POST['email'] == "")
        $error="Please enter a email<br>";
		

		if($_POST['openAPISpec'] == "")
        $error="Please enter a openAPISpec<br>";
    
		// User data to send using HTTP POST method in curl
		//$data = array('email'=>$Email,'openAPISpec'=>$OAS);
		$email=$_POST['email'];
		$openAPISpec=$_POST['openAPISpec'];
        $fields = array(
            'email'=>($_POST['email']),
            'openAPISpec'=>($_POST['openAPISpec'])
        );
		// Data should be passed as json format
		$data_json = json_encode($fields);
		// API URL to send data
		// curl initiate
		$ch = curl_init();
		$url = 'http://application.apisec.ai:8881/api/v1/pentest';
		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

		// SET Method as a POST
		curl_setopt($ch, CURLOPT_POST, 2);

		// Pass user data in POST command
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		// Execute curl and assign returned data
		$response  = curl_exec($ch);
		
		//$result= var_dump(json_decode($response, true));
		//$json_string = json_encode($response, JSON_PRETTY_PRINT)
		
		// Close curl
		curl_close($ch);
		print_r($response)
		

		
		// See response if data is posted successfully or any error
			
?>
</html>