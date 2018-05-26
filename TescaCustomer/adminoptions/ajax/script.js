// magic.js
$(document).ready(function() {

	// process the form
    $('#custsigninform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'TescaCustomer/adminoptions/action.php', // the url where we want to POST
            data        : $('#custsigninform').serialize(), // our data object
			dataType : "JSON",
            success : function(data) {
				
                if(data){

					window.location.href = "TescaCustomer/adminoptions/dashboard.php";
				   
                }
                else{
                    alert("Login Failed. Please try again.");
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
	
	$('#fpcustform').submit(function(event) {
		
			// process the form
			$.ajax({
				type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url         : 'TescaCustomer/adminoptions/action.php', // the url where we want to POST
				data        : $('#fpcustform').serialize(), // our data object
				dataType : "JSON",
				success : function(data) {
					
				  // alert(data + "here");

                    if(data){
                        document.getElementById("messagecustemail").innerHTML="Password submitted to registered email address successfully".fontcolor("green");
                    }
                    else{
                        document.getElementById("messagecustemail").innerHTML="email not found".fontcolor("red");
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
		
	
	

//------------------------------------------------------------------USER DATA-----------------------------------------------------------------------------
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
        $('#updateuserbutton').click(function (event) {
            location.reload();
        })
    });
    $('#userdeletebtn').click(function(event) {

        window.alert(document.getElementById("userdeletebtn").value);
    });

//----------------------------------------------------------------ANNOUNCEMENT-------------------------------------------------------------------------------


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
                       result+="</tr>";
                    }

                    result+="</tbody>";

                    result+="<tfoot>";
                    result+="<tr>";
                    result+="<th>Annc. ID</th>";
                    result+="<th>Type</th>";
                    result+="<th>Description</th>";
                    result+="<th>Annc. Date</th>";
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

    // process the form

        
//-------------------------------------------------------------PAY RENT------------------------------------------------------------------------

    // process the form
    $('#payrentform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#payrentform').serialize(), // our data object
            dataType : "html",
            success : function(data) {
                // alert(data);

                if(data === true || data == 1){
                    document.getElementById("message").innerHTML="Rent paid !!".fontcolor("blue");
                }
                else{
                    document.getElementById("message").innerHTML=data.fontcolor("red");
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#payrentsubmit').click(function (event) {
            location.reload();
        })
    });



//------------------------------------------------------------Parking PERMITS-------------------------------------------------------------------
    // process the form
    $('#displayparkingpermittable').ready(function(event) {

        var formData = {
            forminstance : "displayparkingpermit"
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
                    result+="<th>Permit ID</th>";
                    result+="<th>Permit Type</th>";
                    result+="<th>Permit Holder Name</th>";
                    result+="<th>Permit Valid From Date</th>";
                    result+="<th>Permit Valid Till Date</th>";
                    result+="<th>Permit Issue Date</th>";
                    result+="<th>Action</th>";
                    result+="</tr>";
                    result+="</thead>";

                    result+="<tbody>";
                    for(var i=0;i<parseddata.length;i++)
                    {
                        result+="<tr>";
                        result+= "<td>"+parseddata[i]['permit_id']+"</td>";
                        result+= "<td>"+parseddata[i]['permit_type']+"</td>";
                        result+= "<td>"+parseddata[i]['permit_holder_name']+"</td>";
                        result+= "<td>"+parseddata[i]['permit_valid_from_date']+"</td>";
                        result+= "<td>"+parseddata[i]['permit_valid_till_date']+"</td>";
                        result+= "<td>"+parseddata[i]['permit_issue_date']+"</td>";
                        result+="<td><button type='button' onclick='PermitDeleteBtn("+parseddata[i]['permit_id']+")' class='btn btn-primary'>Delete</button></td>";
                        result+="</tr>";
                    }

                    result+="</tbody>";

                    result+="<tfoot>";
                    result+="<tr>";
                    result+="<th>Permit ID</th>";
                    result+="<th>Permit Type</th>";
                    result+="<th>Permit Holder Name</th>";
                    result+="<th>Permit Valid From Date</th>";
                    result+="<th>Permit Valid Till Date</th>";
                    result+="<th>Permit Issue Date</th>";
                    result+="<th>Action</th>";
                    result+="</tr>";
                    result+="</tfoot>";

                    document.getElementById("displayparkingpermittable").innerHTML = result;
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
    $('#parkingpermitform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#parkingpermitform').serialize(), // our data object
            dataType : "html",
            success : function(data) {
                // alert(data);

                if(data === true || data == 1 ){
                    document.getElementById("message").innerHTML="Parking Permit has been Inserted successfully".fontcolor("blue");
                }
                else{
                    document.getElementById("message").innerHTML= data.fontcolor("red");
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $('#closepp').click(function (event) {
            location.reload();
        })
    });
    $('#parkingpermitdeletebtn').click(function(event) {

        window.alert(document.getElementById("userdeletebtn").value);
    });
    $('#updatepermitform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#updatepermitform').serialize(), // our data object
            dataType : "html",
            success : function(data) {
                // alert(data);

                if(data){
                    document.getElementById("messageupdt").innerHTML="Permit has been Updated successfully".fontcolor("blue");
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

//------------------------------------------------------------------LAST 5 RENT-----------------------------------------------------------------------

    $('#displaylastfivedatatable').ready(function(event) {

        var formData = {
            forminstance : "displaylastfivedata"
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
                    result+="<th>1</th>";
                    result+="<th>2</th>";
                    result+="<th>3</th>";
                    result+="<th>4</th>";
                    result+="<th>5</th>";
                    result+="</tr>";
                    result+="</thead>";

                    result+="<tbody>";
                    for(var i=0;i<parseddata.length;i++)
                    {
                        result+="<tr>";
                        result+= "<td>"+parseddata[i]['a']+"</td>";
                        result+= "<td>"+parseddata[i]['b']+"</td>";
                        result+= "<td>"+parseddata[i]['c']+"</td>";
                        result+= "<td>"+parseddata[i]['d']+"</td>";
                        result+= "<td>"+parseddata[i]['e']+"</td>";
                        result+="</tr>";
                    }

                    result+="</tbody>";

                    result+="<tfoot>";
                    result+="<tr>";
                    result+="<th>1</th>";
                    result+="<th>2</th>";
                    result+="<th>3</th>";
                    result+="<th>4</th>";
                    result+="<th>5</th>";
                    result+="</tr>";
                    result+="</tfoot>";

                    document.getElementById("displaylastfivedatatable").innerHTML = result;
                }
                else{

                    //  console.log(data);
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

 //-----------------------------------------------------------------Existing tickets----------------------------------------------------------------
    $('#displayexistingdatatable').ready(function(event) {

        var formData = {
            forminstance : "displayexistingtickets"
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
					result+="<th>ACTION</th>";
                    result+="</tr>";
                    result+="</thead>";
					
                    result+="<tbody>";
                    for(var i=0;i<parseddata.length;i++)
                    {
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
                        result+= "<td><a href='http://"+location.host+"/tesca-master/TescaAdmin/adminoptions/uploads/"+parseddata[i]['complaint_img']+"' target='_blank'>View Image</a></td>";
                        result+="<td>"+parseddata[i]['complaint_status']+"</td>";
						result+="<td><button type='button' onclick='ExistingticketDeleteBtn("+parseddata[i]['complaint_id']+")' class='btn btn-primary'>Delete</button></td>";
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
					result+="<th>ACTION</th>";
                    result+="</tr>";
                    result+="</tfoot>";

                    document.getElementById("displayexistingdatatable").innerHTML = result;
                }
                else{

                    //  console.log(data);
                }
            }
        })

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
    $('#updateexistingticketform').submit(function(event) {

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'action.php', // the url where we want to POST
            data        : $('#updateexistingticketform').serialize(), // our data object
            dataType : "html",
            success : function(data) {
                // alert(data);

                if(data){
                    document.getElementById("messageupdt").innerHTML="Existing ticket has been Updated successfully".fontcolor("blue");
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

//---------------------------------------------------------------------------------------------------------------------------------------------------
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
function PermitDeleteBtn(value){

    var formData = {
        permit_id : value,
        forminstance : "deletepermit"
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
function PermitUpdateBtn(value){

    var formData = {
        permit_id : value,
        forminstance : "updatepermit"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {

            if(data){

                var parseddata = data;
                var result;


                $('#permitidupdt').val(parseddata[0]['permit_id']);
                $('#pnameupt').val(parseddata[0]['permit_holder_name']);
                $('#validfromupt').val(parseddata[0]['permit_valid_from_date']);
                $('#validuntillupt').val(parseddata[0]['permit_valid_till_date']);
                $('#pissueupt').val(parseddata[0]['permit_issue_date']);
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
function ExistingticketDeleteBtn(value){

    var formData = {
        complaint_id : value,
        forminstance : "deleteexistingticket"
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
function ExistingticketUpdateBtn(value){

    var formData = {
        complaint_id : value,
        forminstance : "updateexistingticket"
    };

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'action.php', // the url where we want to POST
        data        : formData, // our data object
        success : function(data) {

            if(data){

                var parseddata = data;
                var result;


                $('#departmentupdt').val(parseddata[0]['complaints_dept']);
                $('#categoryupdt').val(parseddata[0]['complaint_category']);
                $('#subcategoryupdt').val(parseddata[0]['complaint_sub_category']);
                $('#cdescupdt').val(parseddata[0]['complaint_desc']);
                $('#cimgupdt').val(parseddata[0]['complaint_img']);
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
