$(document).ready(()=>{
    $('#order').click((e)=>{
        e.preventDefault();

        let flag = 0;

        let fname = $('#fname').val();
        let lname = $('#lname').val();
        let addr = $('#address').val();
        let city = $('#city').val();
        let state = $('#state').val();
        let country = $('#country').val();
        let phoneno = $('#phoneno').val();
        let email = $('#email').val();

        if(fname == '')
          {
            $("#error").css("display", "block");
            $("#error").text("First Name is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(lname == '')
          {
            $("#error").css("display", "block");
            $("#error").text("Last Name is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(addr == '')
          {
            $("#error").css("display", "block");
            $("#error").text("Address is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(city == '')
          {
            $("#error").css("display", "block");
            $("#error").text("City is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(state == '')
          {
            $("#error").css("display", "block");
            $("#error").text("State is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(country == '')
          {
            $("#error").css("display", "block");
            $("#error").text("country is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(phoneno == '')
          {
            $("#error").css("display", "block");
            $("#error").text("Phone No is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(email == '')
          {
            $("#error").css("display", "block");
            $("#error").text("Name is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(flag == 0){
            let order = {
                fname : fname,
                lname : lname,
                address : addr,
                city : city,
                state : state,
                country : country,
                phoneno : phoneno,
                email : email
            }

            $.ajax({
                type : 'POST',
                url : '/php/customerOrder.php',     
                data : order,
                dataType : 'JSON',
                success : function(data){
                    if(data.success == true){
                      // $('#totalCart').html(0);
                      $(location).attr("href", "/html/customers/home.php");
                    }else{
                      console.log(data.message);
                    }
                }
            })
          }


    })
})

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
  }