// magic.js
$(document).ready(function() {

	
	// process the form
    $('#adminsigninform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'TescaAdmin/adminoptions/action.php', // the url where we want to POST
            data        : $('#adminsigninform').serialize(), // our data object
			dataType : "JSON",
            success : function(data) {
				
                if(data){

					window.location.href = "TescaAdmin/adminoptions/dashboard.php";
				   
                }
                else{
                    alert("Login Failed. Please try again.");
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
	
	$('#fpadminform').submit(function(event) {
		
			// process the form
			$.ajax({
				type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url         : 'TescaAdmin/adminoptions/action.php', // the url where we want to POST
				data        : $('#fpadminform').serialize(), // our data object
				dataType : "JSON",
				success : function(data) {
					
				  // alert(data + "here");

                    if(data){
                        document.getElementById("messageadminemail").innerHTML="Password submitted to registered email address successfully".fontcolor("green");
                    }
                    else{
                        document.getElementById("messageadminemail").innerHTML="email not found".fontcolor("red");
                    }
				}
			})
			// stop the form from submitting the normal way and refreshing the page
			event.preventDefault();
    });
	
	$('#logout').click(function(event) {
		//alert('function called');
		var formData = {
			forminstance : "logoutform"
		};
			// process the form
			$.ajax({
				type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url         : 'action.php', // the url where we want to POST
				data        : formData, // our data object
				dataType : "JSON",
				success : function(data) {
					
				   //alert(data + "here");
					
					if(data){
						window.location.href = "http://"+location.host+"/tesca-master/index.php";
					}
					else{
						alert("Logout error. Please try again.");
					}
				}
			})
			// stop the form from submitting the normal way and refreshing the page
			event.preventDefault();
    });
		
	
	
	// process the form
    $('#contactForm').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'TescaAdmin/adminoptions/action.php', // the url where we want to POST
            data        : $('#contactForm').serialize(), // our data object
			dataType : "JSON",
            success : function(data) {	
				
                if(data){
                    //alert('Contact Form submitted successfully.');
					if(data != true)
					{
						alert(data);
					}
					else 
					{
						alert("Contact form submitted successfully.");
						return;
					}
                }
                else{
                    alert("Submission Error");          
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });


    // process the form
    $('#displayuserdatatable').ready(function(event) {
	
	var formData = {
		forminstance : "displayuserdata"
	};
	
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : formData, // our data object
            dataType : "json",
            success : function(data) {

                if(data){

                    var parseddata = data;
					var result;
			
				  result+="<thead>";
				  result+="<tr>";
				  result+="<th>User ID</th>";
				  result+="<th>First Name</th>";
				  result+="<th>Middle Name</th>";
				  result+="<th>Last Name</th>";
				  result+="<th>Home Phone</th>";
				  result+="<th>Alternate Phone</th>";
				  result+="<th>Cell Phone</th>";
				  result+="<th>Email ID</th>";
				  result+="<th>Address Line 1</th>";
				  result+="<th>Address Line 2</th>";
				  result+="<th>City</th>";
				  result+="<th>Province</th>";
				  result+="<th>Zip Code</th>";
				  result+="<th>Country</th>";
				  result+="<th>Username</th>";
				  result+="<th>Date Created</th>";
				  result+="<th>isActive</th>";
				  result+="<th>User Category</th>";
				  result+="<th>Update</th>";
				  result+="<th>Delete</th>";
				  result+="</tr>";
				  result+="</thead>";
				  
				  result+="<tbody>";
					for(var i=0;i<parseddata.length;i++)
					{
						result+="<tr>";
							result+= "<td>"+parseddata[i]['user_id']+"</td>";
							result+= "<td>"+parseddata[i]['first_name']+"</td>";
							result+= "<td>"+parseddata[i]['middle_name']+"</td>";
							result+= "<td>"+parseddata[i]['last_name']+"</td>";
							result+= "<td>"+parseddata[i]['home_phone']+"</td>";
							result+= "<td>"+parseddata[i]['alternate_phone']+"</td>";
							result+= "<td>"+parseddata[i]['cell_phone']+"</td>";
							result+= "<td>"+parseddata[i]['email']+"</td>";
							result+= "<td>"+parseddata[i]['address_line1']+"</td>";
							result+= "<td>"+parseddata[i]['address_line2']+"</td>";
							result+= "<td>"+parseddata[i]['city']+"</td>";
							result+= "<td>"+parseddata[i]['province']+"</td>";
							result+= "<td>"+parseddata[i]['zipcode']+"</td>";
							result+= "<td>"+parseddata[i]['country']+"</td>";
							result+= "<td>"+parseddata[i]['user_name']+"</td>";
							result+= "<td>"+parseddata[i]['date_created']+"</td>";
							result+= "<td>"+parseddata[i]['is_active']+"</td>";
							result+= "<td>"+parseddata[i]['user_category']+"</td>";
							result+="<td><button type='button' onclick='userUpdateBtn("+parseddata[i]['user_id']+")' class='btn btn-primary'>Update</button></td>";
							result+="<td><button type='button' onclick='userDeleteBtn("+parseddata[i]['user_id']+")' class='btn btn-primary'>Delete</button></td>";
						result+="</tr>";
					}
				
				  result+="</tbody>";
				  
				  result+="<tfoot>";
				  result+="<tr>";
				  result+="<th>User ID</th>";
				  result+="<th>First Name</th>";
				  result+="<th>Middle Name</th>";
				  result+="<th>Last Name</th>";
				  result+="<th>Home Phone</th>";
				  result+="<th>Alternate Phone</th>";
				  result+="<th>Cell Phone</th>";
				  result+="<th>Email ID</th>";
				  result+="<th>Address Line 1</th>";
				  result+="<th>Address Line 2</th>";
				  result+="<th>City</th>";
				  result+="<th>Province</th>";
				  result+="<th>Zip Code</th>";
				  result+="<th>Country</th>";
				  result+="<th>Username</th>";
				  result+="<th>Date Created</th>";
				  result+="<th>isActive</th>";
				  result+="<th>User Category</th>";
				  result+="<th>Update</th>";
				  result+="<th>Delete</th>";
				  result+="</tr>";
				  result+="</tfoot>";
                
				document.getElementById("displayuserdatatable").innerHTML = result;
				}
                else{
                    alert("error");
                    console.log(data);
                }
            }
        })
        // stop the form from submitting the normal way and refreshing the page
       // event.preventDefault();
    });

	
	// process the form
    $('#userdeletebtn').click(function(event) {
	
			window.alert(document.getElementById("userdeletebtn").value);
    });
        
        // stop the form from submitting the normal way and refreshing the page
       // event.preventDefault();

				
    // process the form
    $('#insertuserform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#insertuserform').serialize(), // our data object
            dataType : "html",
            success : function(data) {
               // alert(data);

                if(data){
                    document.getElementById("message").innerHTML="User has been Inserted successfully".fontcolor("blue");
                }
                else{
                    document.getElementById("message").innerHTML="ERROR in Insertion".fontcolor("red");
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#closeinsert').click(function (event) {
			location.reload();
        })
    });
    $('#updateuserform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#updateuserform').serialize(), // our data object
            dataType : "html",
            success : function(data) {
               // alert(data);

                if(data){
                    document.getElementById("messageupdt").innerHTML="User has been Updated successfully".fontcolor("blue");
                }
                else{
                    document.getElementById("messageupdt").innerHTML="ERROR in updation".fontcolor("red");
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#closeupdate').click(function (event) {
            location.reload();
        })
    });

	// process the form
    $('#displayaptuserdatatable').ready(function(event) {
	
	var formData = {
		forminstance : "displayaptuserdata"
	};
	
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : formData, // our data object
            dataType : "json",
            success : function(data) {

                if(data){

                    var parseddata = data;
					var result;
			
				  result+="<thead>";
				  result+="<tr>";
				  result+="<th>Ownership History ID</th>";
				  result+="<th>Apartment Number</th>";
				  result+="<th>First Name</th>";
				  result+="<th>Last Name</th>";
				  result+="<th>Lease Start Date</th>";
				  result+="<th>Lease End Date</th>";
				  result+="<th>Is Current Tenant?</th>";
				  result+="<th>Date Created</th>";
				  result+="<th>Date Modified</th>";
				  result+="</tr>";
				  result+="</thead>";
				  
				  result+="<tbody>";
					for(var i=0;i<parseddata.length;i++)
					{
						result+="<tr>";
							result+= "<td>"+parseddata[i]['ownership_history_id']+"</td>";
							result+= "<td>"+parseddata[i]['apt_number']+"</td>";
							result+= "<td>"+parseddata[i]['first_name']+"</td>";
							result+= "<td>"+parseddata[i]['last_name']+"</td>";
							result+= "<td>"+parseddata[i]['date_lease_started']+"</td>";
							result+= "<td>"+parseddata[i]['date_lease_ended']+"</td>";
							result+= "<td>"+parseddata[i]['is_current_tenant']+"</td>";
							result+= "<td>"+parseddata[i]['date_created']+"</td>";
							result+= "<td>"+parseddata[i]['date_modified']+"</td>";
							//result+="<td><button type='button' onclick='userUpdateBtn("+parseddata[i]['ownership_history_id']+")' class='btn btn-primary'>Update</button></td>";
							//result+="<td><button type='button' onclick='userDeleteBtn("+parseddata[i]['ownership_history_id']+")' class='btn btn-primary'>Delete</button></td>";
						result+="</tr>";
					}
				
				  result+="</tbody>";
				  
				  result+="<tfoot>";
				  result+="<tr>";
				  result+="<th>Ownership History ID</th>";
				  result+="<th>Apartment Number</th>";
				  result+="<th>First Name</th>";
				  result+="<th>Last Name</th>";
				  result+="<th>Lease Start Date</th>";
				  result+="<th>Lease End Date</th>";
				  result+="<th>Is Current Tenant?</th>";
				  result+="<th>Date Created</th>";
				  result+="<th>Date Modified</th>";
				  result+="</tr>";
				  result+="</tfoot>";
                
				document.getElementById("displayaptuserdatatable").innerHTML = result;
				}
                else{
                    alert("error");
                    console.log(data);
                }
            }
        })
        // stop the form from submitting the normal way and refreshing the page
       // event.preventDefault();
    });
	
	// process the form
    $('#displayaptdatatable').ready(function(event) {
	
	var formData = {
		forminstance : "displayaptdata"
	};
	
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : formData, // our data object
            dataType : "json",
            success : function(data) {

                if(data){

                    var parseddata = data;
					var result;
			
				  result+="<thead>";
				  result+="<tr>";
				  result+="<th>Apartment ID</th>";
				  result+="<th>Apartment Number</th>";
				  result+="<th>Apartment Status</th>";
				  result+="<th>Update</th>";
				  result+="<th>Delete</th>";
				  result+="</tr>";
				  result+="</thead>";
				  
				  result+="<tbody>";
					for(var i=0;i<parseddata.length;i++)
					{
						result+="<tr>";
							result+= "<td>"+parseddata[i]['apt_id']+"</td>";
							result+= "<td>"+parseddata[i]['apt_number']+"</td>";
							result+= "<td>"+parseddata[i]['apt_status']+"</td>";
							result+="<td><button type='button' class='btn btn-primary' onclick='aptUpdateBtn("+parseddata[i]['apt_id']+")' >Update</button></td>";
							result+="<td><button type='submit' value='Delete' class='btn btn-primary' onclick='aptDeleteBtn("+parseddata[i]['apt_id']+")'>Delete</button></td>";
						result+="</tr>";
					}
				
				  result+="</tbody>";
				  
				  result+="<tfoot>";
				  result+="<tr>";
				  result+="<th>Apartment ID</th>";
				  result+="<th>Apartment Number</th>";
				  result+="<th>Apartment Status</th>";
				  result+="<th>Update</th>";
				  result+="<th>Delete</th>";
				  result+="</tr>";
				  result+="</tfoot>";
                
				document.getElementById("displayaptdatatable").innerHTML = result;
				}
                else{
  //                  alert("in else kahan sey");
//                    console.log(data);
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
	
    // process the form
    $('#insertapartmentform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#insertapartmentform').serialize(), // our data object
            success : function(data) {
                   // alert(data);
                if(data){
                    document.getElementById("message").innerHTML="Apartment has been inserted successfully".fontcolor("blue");
                }
                else{
                    document.getElementById("message").innerHTML="ERROR in Insertion".fontcolor("red");
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#closeinsert').click(function (event) {
            location.reload();
        })
    });
    $('#updateapartmentform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#updateapartmentform').serialize(), // our data object
            success : function(data) {
               // alert(data);
                if(data){
                    document.getElementById("messageupdt").innerHTML="Apartment has been updated successfully".fontcolor("blue");
                }
                else{
                    document.getElementById("messageupdt").innerHTML="ERROR in Updation".fontcolor("red");
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#closeupdate').click(function (event) {
            location.reload();
        })
    });
    $('#insertaptuserform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#insertaptuserform').serialize(), // our data object
            success : function(data) {
                // alert(data);
                if(data){
                    document.getElementById("message").innerHTML="Apartment has been leased successfully".fontcolor("blue");
                }
                else{
                    document.getElementById("message").innerHTML="ERROR in leasing".fontcolor("red");
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#closeinsert').click(function (event) {
            location.reload();
        })
    });
	// process the form
    $('#displaydeptdatatable').ready(function(event) {
	
	var formData = {
		forminstance : "displaydeptdata"
	};
	
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : formData, // our data object
            dataType : "json",
            success : function(data) {

                if(data){

                    var parseddata = data;
					var result;
			
				  result+="<thead>";
				  result+="<tr>";
				  result+="<th>Department ID</th>";
				  result+="<th>Department Name</th>";
				  result+="<th>Department Description</th>";
				  result+="<th>Update</th>";
				  result+="<th>Delete</th>";
				  result+="</tr>";
				  result+="</thead>";
				  
				  result+="<tbody>";
					for(var i=0;i<parseddata.length;i++)
					{
						result+="<tr>";
							result+= "<td>"+parseddata[i]['dept_id']+"</td>";
							result+= "<td>"+parseddata[i]['dept_name']+"</td>";
							result+= "<td>"+parseddata[i]['dept_desc']+"</td>";
							result+="<td><button type='button' onclick='deptUpdateBtn("+parseddata[i]['dept_id']+")' class='btn btn-primary' >Update</button></td>";
							result+="<td><button type='button' onclick='deptDeleteBtn("+parseddata[i]['dept_id']+")' class='btn btn-primary'>Delete</button></td>";
						result+="</tr>";
					}
				
				  result+="</tbody>";
				  
				  result+="<tfoot>";
				  result+="<tr>";
				  result+="<th>Department ID</th>";
				  result+="<th>Department Name</th>";
				  result+="<th>Department Description</th>";
				  result+="<th>Update</th>";
				  result+="<th>Delete</th>";
				  result+="</tr>";
				  result+="</tfoot>";
                
				document.getElementById("displaydeptdatatable").innerHTML = result;
				}
                else{
    //                alert("in else kahan sey");
      //              console.log(data);
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
	

    $('#insertdepartmentform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#insertdepartmentform').serialize(), // our data object
            success : function(data) {
                //alert(data);
                if(data){
                    //alert('in if');
        //            console.log(data);
                    document.getElementById("message").innerHTML="New Department has been inserted successfully".fontcolor("blue");
                }
                else{
                    //alert("in else kahan sey");
          //          console.log(data);
                    document.getElementById("message").innerHTML="ERROR in Insertion".fontcolor("red");
                }
            }
        })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#closeinsert').click(function (event) {
            location.reload();
        })
    });
    $('#updatedepartmentform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#updatedepartmentform').serialize(), // our data object
            success : function(data) {

                if(data){
                    document.getElementById("messageupdt").innerHTML="Department has been updated successfully".fontcolor("blue");
                }
                else{

                    document.getElementById("messageupdt").innerHTML="ERROR in updation".fontcolor("red");
                }
            }
        })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
		$('#closeupdate').click(function (event) {
            location.reload();
        })
    });

	
	// process the form
    $('#displayassetsdatatable').ready(function(event) {
	
	var formData = {
		forminstance : "displayassetsdata"
	};
	
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : formData, // our data object
            dataType : "json",
            success : function(data) {

                if(data){

                    var parseddata = data;
					var result;
			
				  result+="<thead>";
				  result+="<tr>";
				  result+="<th>Asset ID</th>";
				  result+="<th>Asset Type</th>";
				  result+="<th>Name</th>";
				  result+="<th>Quantity</th>";
				  result+="<th>Purchase Date</th>";
				  result+="<th>Vendor Name</th>";
				  result+="<th>Unit Price</th>";
				  result+="<th>Unit of Measure</th>";
				  result+="<th>Update</th>";
				  result+="<th>Delete</th>";
				  result+="</tr>";
				  result+="</thead>";
				  
				  result+="<tbody>";
					for(var i=0;i<parseddata.length;i++)
					{
						result+="<tr>";
							result+= "<td>"+parseddata[i]['asset_id']+"</td>";
							result+= "<td>"+parseddata[i]['asset_type']+"</td>";
							result+= "<td>"+parseddata[i]['asset_name']+"</td>";
							result+= "<td>"+parseddata[i]['asset_qty']+"</td>";
							result+= "<td>"+parseddata[i]['asset_purchase_date']+"</td>";
							result+= "<td>"+parseddata[i]['asset_vendor_name']+"</td>";
							result+= "<td>"+parseddata[i]['asset_unit_price']+"</td>";
							result+= "<td>"+parseddata[i]['asset_unit_of_measure']+"</td>";
							result+="<td><button type='button' onclick='assetUpdateBtn("+parseddata[i]['asset_id']+")' class='btn btn-primary'>Update</button></td>";
							result+="<td><button type='button' onclick='assetDeleteBtn("+parseddata[i]['asset_id']+")' class='btn btn-primary'>Delete</button></td>";
						result+="</tr>";
					}
				
				  result+="</tbody>";
				  
				  result+="<tfoot>";
				  result+="<tr>";
				  result+="<th>Asset ID</th>";
				  result+="<th>Asset Type</th>";
				  result+="<th>Name</th>";
				  result+="<th>Quantity</th>";
				  result+="<th>Purchase Date</th>";
				  result+="<th>Vendor Name</th>";
				  result+="<th>Unit Price</th>";
				  result+="<th>Unit of Measure</th>";
				  result+="<th>Update</th>";
				  result+="<th>Delete</th>";
				  result+="</tr>";
				  result+="</tfoot>";
                
				document.getElementById("displayassetsdatatable").innerHTML = result;
				}
                else{
            
					//console.log(data);
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
	
    $('#insertassetform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#insertassetform').serialize(), // our data object
            success : function(data) {
             
                if(data){
             
                    //console.log(data);
                    document.getElementById("message").innerHTML="New Asset has been inserted successfully".fontcolor("blue");
                }
                else{
                    //console.log(data);
                    document.getElementById("message").innerHTML="ERROR in Insertion".fontcolor("red");
                }
            }
        })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#closeinsert').click(function (event) {
            location.reload();
        })

    });
    $('#updateassetform').submit(function(event) {
		
        // process the form
       $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#updateassetform').serialize(), // our data object
            success : function(data) {
                alert(data);
                if(data){
                    //console.log(data);
                    document.getElementById("messageupdt").innerHTML="Asset has been updated successfully".fontcolor("blue");
                }
                else{
                    //console.log(data);
                    document.getElementById("messageupdt").innerHTML="ERROR in updation".fontcolor("red");
                }
            }
        })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#closeupdate').click(function (event) {
            location.reload();
        })

    });

    $('#insertdocumentform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#insertdocumentform').serialize(), // our data object
            success : function(data) {
                
                if(data){
                    
                    //console.log(data);
                    document.getElementById("message").innerHTML="New Document has been inserted successfully".fontcolor("blue");
                }
                else{
                    
                    //console.log(data);
                    document.getElementById("message").innerHTML="ERROR in Insertion".fontcolor("red");
                }
            }
        })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
    
	$('#displayfeedbackdataTable').ready(function(event) {

        var formData = {
            forminstance : "displayfeedbackdata"
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : formData, // our data object
            dataType : "json",
            success : function(data) {

                if(data){

                    var parseddata = data;
                    var result;

                    result+="<thead>";
                    result+="<tr>";
                    result+="<th>Feedback ID</th>";
					result+="<th>Date</th>";
                    result+="<th>First Name</th>";
                    result+="<th>Last Name</th>";
                    result+="<th>Email</th>";
                    result+="<th>Contact Number</th>";
                    result+="<th>Feedback Description</th>";
                    result+="</tr>";
                    result+="</thead>";

                    result+="<tbody>";
                    for(var i=0;i<parseddata.length;i++)
                    {
                        result+="<tr>";
                        result+= "<td>"+parseddata[i]['feedback_id']+"</td>";
						result+= "<td>"+parseddata[i]['feedback_date']+"</td>";
                        result+= "<td>"+parseddata[i]['first_name']+"</td>";
                        result+= "<td>"+parseddata[i]['last_name']+"</td>";
                        result+="<td>"+parseddata[i]['email_id']+"</td>";
                        result+="<td>"+parseddata[i]['contact_num']+"</td>";
                        result+="<td>"+parseddata[i]['feedback_desc']+"</td>";
                        result+="</tr>";
                    }

                    result+="</tbody>";

                    result+="<tfoot>";
                    result+="<tr>";
                    result+="<th>Feedback ID</th>";
					result+="<th>Date</th>";
                    result+="<th>First Name</th>";
                    result+="<th>Last Name</th>";
                    result+="<th>Email</th>";
                    result+="<th>Contact Number</th>";
                    result+="<th>Feedback Description</th>";
                    result+="</tr>";
                    result+="</tfoot>";

                    document.getElementById("displayfeedbackdataTable").innerHTML = result;
                }
                else{
                    
					//console.log(data);
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
	
	
	$('#displaycomplaintsdataTable').ready(function(event) {

        var formData = {
            forminstance : "displaycomplaintsdata"
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : formData, // our data object
            dataType : "json",
            success : function(data) {
			
                if(data){

                    var parseddata = data;
                    var result;
					
                    result+="<thead>";
                    result+="<tr>";
                    result+="<th>Complaint ID</th>";
                    result+="<th>Complaint Date</th>";
					result+="<th>Apartment #</th>";
                    result+="<th>First Name</th>";
                    result+="<th>Last Name</th>";
                    result+="<th>Email</th>";
					result+="<th>Contact Number</th>";
					result+="<th>Department</th>";
					result+="<th>Severity</th>";
					result+="<th>Complaint Description</th>";
					result+="<th>Complaint Image </th>";
					result+="<th>Status</th>";
					result+="<th>Update</th>";
					result+="<th>Delete</th>";
                    result+="</tr>";
                    result+="</thead>";

                    result+="<tbody>";
                    for(var i=0;i<parseddata.length;i++)
                    {
						console.log(parseddata[i]);
                        result+="<tr>";
                        result+= "<td>"+parseddata[i]['complaint_id']+"</td>";
						result+= "<td>"+parseddata[i]['date_created']+"</td>";
                        result+= "<td>"+parseddata[i]['apt_number']+"</td>";
                        result+= "<td>"+parseddata[i]['first_name']+"</td>";
                        result+= "<td>"+parseddata[i]['last_name']+"</td>";
                        result+= "<td>"+parseddata[i]['email']+"</td>";
                        result+= "<td>"+parseddata[i]['cell_phone']+"</td>";
                        result+= "<td>"+parseddata[i]['complaints_dept']+"</td>";
                        result+= "<td>"+parseddata[i]['complaint_severity']+"</td>";
                        result+="<td>"+parseddata[i]['complaint_desc']+"</td>";
                        result+="<td><a href='uploads/"+parseddata[i]['complaint_img']+"' target='_blank'>View Image</a></td>";
                        result+="<td>"+parseddata[i]['complaint_status']+"</td>";
						result+="<td><button type='button' onclick='cmpUpdateBtn("+parseddata[i]['complaint_id']+")' class='btn btn-primary'>Close</button></td>";
						result+="<td><button type='button' onclick='cmpDelBtn("+parseddata[i]['complaint_id']+")' class='btn btn-primary'>Delete</button></td>";
                        result+="</tr>";
                    }

                    result+="</tbody>";

                    result+="<tfoot>";
                    result+="<tr>";
                    result+="<th>Complaint ID</th>";
                    result+="<th>Complaint Date</th>";
					result+="<th>Apartment #</th>";
                    result+="<th>First Name</th>";
                    result+="<th>Last Name</th>";
                    result+="<th>Email</th>";
					result+="<th>Contact Number</th>";
					result+="<th>Department</th>";
					result+="<th>Severity</th>";
					result+="<th>Complaint Description</th>";
					result+="<th>Complaint Image </th>";
					result+="<th>Status</th>";
					result+="<th>Update</th>";
					result+="<th>Delete</th>";
                    result+="</tr>";
                    result+="</tfoot>";

                    document.getElementById("displaycomplaintsdataTable").innerHTML = result;
                }
                else{
                    
					//console.log(data);
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
	
	

    $('#insertfeedbackform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#insertfeedbackform').serialize(), // our data object
            success : function(data) {
                
                if(data){
                    
                    //console.log(data);
                    document.getElementById("message").innerHTML="feedback has been inserted successfully".fontcolor("blue");
                }
                else{
                    
                    //console.log(data);
                    document.getElementById("message").innerHTML="ERROR in Insertion".fontcolor("red");
                }
            }
        })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

	// process the form
    $('#displayanncdatatable').ready(function(event) {
	
	var formData = {
		forminstance : "displayanncdata"
	};
	
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : formData, // our data object
            dataType : "json",
            success : function(data) {

                if(data){

                    var parseddata = data;
					var result;
			
				  result+="<thead>";
				  result+="<tr>";
				  result+="<th>Annc. ID</th>";
				  result+="<th>Type</th>";
				  result+="<th>Description</th>";
				  result+="<th>Annc. Date</th>";
				  result+="<th>Update</th>";
				  result+="<th>Delete</th>";
				  result+="</tr>";
				  result+="</thead>";
				  
				  result+="<tbody>";
					for(var i=0;i<parseddata.length;i++)
					{
						result+="<tr>";
							result+= "<td>"+parseddata[i]['announcement_id']+"</td>";
							result+= "<td>"+parseddata[i]['announcement_type']+"</td>";
							result+= "<td>"+parseddata[i]['announcement_desc']+"</td>";
							result+= "<td>"+parseddata[i]['announcement_date']+"</td>";
							result+="<td><button type='button' class='btn btn-primary' onclick='announceUpdateBtn("+parseddata[i]['announcement_id']+")'>Update</button></td>";
							result+="<td><button type='button' onclick='announceDeleteBtn("+parseddata[i]['announcement_id']+")' class='btn btn-primary'>Delete</button></td>";
						result+="</tr>";
					}
				
				  result+="</tbody>";
				  
				  result+="<tfoot>";
				  result+="<tr>";
				  result+="<th>Annc. ID</th>";
				  result+="<th>Type</th>";
				  result+="<th>Description</th>";
				  result+="<th>Annc. Date</th>";
				  result+="<th>Update</th>";
				  result+="<th>Delete</th>";
				  result+="</tr>";
				  result+="</tfoot>";
                
				document.getElementById("displayanncdatatable").innerHTML = result;
				}
                else{
                
                  //  console.log(data);
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
	
    $('#insertannouncementform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#insertannouncementform').serialize(), // our data object
            success : function(data) {
                
                if(data){
                    document.getElementById("message").innerHTML="Announcement  has been made successfully".fontcolor("blue");
                 }
                else{
                    
                    //console.log(data);
                    document.getElementById("message").innerHTML="ERROR in creation".fontcolor("red");
                 }
            }
        })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#closeinsert').click(function (event) {
            location.reload();
        })

    });
	
    $('#updateanncouncementform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#updateanncouncementform').serialize(), // our data object
            success : function(data) {
                
                if(data){
                    document.getElementById("messageupdt").innerHTML="Announcement has been updated successfully".fontcolor("blue");
                }
                else{
                    
                    //console.log(data);
                    document.getElementById("messageupdt").innerHTML="ERROR in updation".fontcolor("red");
                }
            }
        })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#closeupdate').click(function (event) {
            location.reload();
        })

    });	
	
	// process the form
    $('#aptownhistrptform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#aptownhistrptform').serialize(), // our data object
			dataType : "JSON",
            success : function(data) {	
				
                if(data){
                    //alert('Contact Form submitted successfully.');
					if(data != true)
					{
						alert(data);
					}
					else 
					{
						alert("sdfsdfsdf form submitted successfully.");
					}
                }
                else{
                    alert("Submission Error");          
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
});

function userDeleteBtn(value){

		var formData = {
			userid : value,
			forminstance : "deleteuser"
		};
	
	$.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : formData, // our data object
            success : function(data) {
                alert(data);
            }
        })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
		location.reload();
}
function userUpdateBtn(value){

    var formData = {
        userid : value,
        forminstance : "updateuser"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {
            
            if(data){

                var parseddata = data;
                var result;

                   
                $('#useridupdt').val(parseddata[0]['user_id']);
				$('#fnameupdt').val(parseddata[0]['first_name']);
                $('#mnameupdt').val(parseddata[0]['middle_name']);
                $('#lnameupdt').val(parseddata[0]['last_name']);
                $('#hphoneupdt').val(parseddata[0]['home_phone']);
                $('#aphoneupdt').val(parseddata[0]['alternate_phone']);
                $('#cphoneupdt').val(parseddata[0]['cell_phone']);
                $('#emailupdt').val(parseddata[0]['email']);
                $('#aline1updt').val(parseddata[0]['address_line1']);
                $('#aline2updt').val(parseddata[0]['address_line2']);
                $('#cityupdt').val(parseddata[0]['city']);
                $('#provinceupdt').val(parseddata[0]['province']);
                $('#zipcodeupdt').val(parseddata[0]['zipcode']);
                $('#countryupdt').val(parseddata[0]['country']);
                $('#unameupdt').val(parseddata[0]['user_name']);
                $('#passwordupdt').val(parseddata[0]['password']);
                $('#activeupdt').val(parseddata[0]['is_active']);
                $('#updatemodal').modal('show');


                    // document.getElementById("displayanncdatatable").innerHTML = result;
            }
            else{
                
                //  console.log(data);
            }
        }
    })
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
}
function aptDeleteBtn(value){

    var formData = {
        aptid : value,
        forminstance : "deleteapt"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {
            //alert(data);
        }
    })
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
    location.reload();
}
function aptUpdateBtn(value){

    var formData = {
        aptid : value,
        forminstance : "updateapt"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {
           
            if(data){
                var parseddata = data;
                
                $('#aptidupdt').val(parseddata[0]['apt_id']);
                $('#anumberupdt').val(parseddata[0]['apt_number']);
                if((parseddata[0]['apt_status']) == 'leased') {
                    $('#aptstatusleased').prop("checked", true);
                }
                else if((parseddata[0]['apt_status']) == 'tolet'){
                    $('#aptstatustolet').prop("checked", true);
				}
                else if((parseddata[0]['apt_status']) == 'underrenovation'){
                    $('#aptstatusunder').prop("checked", true);
                }
                $('#updatemodal').modal('show');

                // document.getElementById("displayanncdatatable").innerHTML = result;
            }
            else{
                
                //  console.log(data);
            }
        }
    })
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
}
function deptDeleteBtn(value){

    var formData = {
        deptid : value,
        forminstance : "deletedept"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {
            alert(data);
        }
    })
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
    location.reload();
}
function deptUpdateBtn(value){

    var formData = {
        deptid : value,
        forminstance : "updatedept"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {
            
            if(data){
                var parseddata = data;
                //alert(parseddata[0]['apt_id']);
                $('#deptidupdt').val(parseddata[0]['dept_id']);
                $('#dnameupdt').val(parseddata[0]['dept_name']);
				$('#descupdt').val(parseddata[0]['dept_desc']);
                $('#updatemodal').modal('show');
                // document.getElementById("displayanncdatatable").innerHTML = result;
            }
            else{
                
                //  console.log(data);
            }
        }
    })
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
}
function assetDeleteBtn(value){

    var formData = {
        assetid : value,
        forminstance : "deleteasset"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {
            alert(data);
        }
    })
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
    location.reload();
}
function assetUpdateBtn(value){
    var formData = {
        assetid : value,
        forminstance : "updateasset"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {
            
            if(data){
                var parseddata = data;
            
                $('#assetidupdt').val(parseddata[0]['asset_id']);
                $('#atypeupdt').val(parseddata[0]['asset_type']);
                $('#anameupdt').val(parseddata[0]['asset_name']);
                $('#aquantityupdt').val(parseddata[0]['asset_qty']);
                $('#pdateupdt').val(parseddata[0]['asset_purchase_date']);
                $('#vnameupdt').val(parseddata[0]['asset_vendor_name']);
                $('#upriceupdt').val(parseddata[0]['asset_unit_price']);
                $('#unitupdt').val(parseddata[0]['asset_unit_of_measure']);
                $('#updatemodal').modal('show');
                // document.getElementById("displayanncdatatable").innerHTML = result;
            }
            else{
                
                //  console.log(data);
            }
        }
    })
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
}
function announceDeleteBtn(value){

    var formData = {
        announce_id : value,
        forminstance : "deleteannouncement"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {
            alert(data);
        }
    })
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
    location.reload();
}
function announceUpdateBtn(value){
    var formData = {
        announce_id : value,
        forminstance : "updateannouncement"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {
            if(data){
                var parseddata = data;
                
                $('#anncidupdt').val(parseddata[0]['announcement_id']);
                if((parseddata[0]['announcement_type']) == 'normal') {
                    $('#atypenormal').prop("checked", true);
                }
                else if((parseddata[0]['announcement_type']) == 'highimp'){
                    $('#atypehighimp').prop("checked", true);
                }
                else if((parseddata[0]['announcement_type']) == 'critical'){
                    $('#atypecritical').prop("checked", true);
                }
                $('#adescupdt').val(parseddata[0]['announcement_desc']);
                $('#uidupdt').val(parseddata[0]['announcement_by_user_id']);
                $('#updatemodal').modal('show');
                
            }
            else{
                
                //  console.log(data);
            }
        }
    })
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
}

function cmpUpdateBtn(value){
	
    var formData = {
        cmpid : value,
        forminstance : "closecomplaint"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {
            
        }
    })
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
    location.reload();
}

function cmpDelBtn(value){
	
    var formData = {
        cmpid : value,
        forminstance : "deletecomplaint"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {
            
        }
    })
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
    location.reload();
}