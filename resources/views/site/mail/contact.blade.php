<!DOCTYPE html>
<html>
<head>
    <title>Masala House</title>
</head>

<body>
    <h1>{{ $details['request_name'] ?? 'Contact Us' }}</h1>
    <div class="row">
    	<div class="col-md-2">
    		<p><b>Name:</b>{{ $details['name'] ?? "N/A" }}</p>
    	</div>
    	
    </div>
    <div class="row">
    	<div class="col-md-2">
    		<p><b>Email:</b>{{ $details['email'] ?? "N/A" }}</p>
    	</div>
    	
    </div>
     <div class="row">
    	<div class="col-md-2">
    		<p><b>Phone:</b>{{ $details['phone'] ?? "N/A" }}</p>
    	</div>
    	
    </div>
    
    <div class="row">
    	<div class="col-md-2">
    		<p><b>Date:</b>{{ $details['date'] ?? "N/A" }}</p>
    	</div>
    	
    </div>
    <div class="row">
    	<div class="col-md-2">
    		<p><b>Time:</b>{{ $details['time'] ?? "N/A" }}</p>
    	</div>
    	
    </div>
     <div class="row">
    	<div class="col-md-2">
    		<p><b>Persons:</b>{{ $details['persons'] ?? "N/A" }}</p>
    	</div>
    </div>
      <div class="row">
    	<div class="col-md-2">
    		<p><b>Message:</b>{{ $details['message'] ?? "N/A" }}</p>
    	</div>
    </div>

    
    
    <p>Thank you</p>
</body>
</html>