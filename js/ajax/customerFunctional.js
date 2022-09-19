$(document).ready(()=>{

    $.ajax({
        type: "post",
        url: "/php/products.php",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        async: true,
        success:function(data){
            
            if(data.success == true){
                let productData = data.data;
                let productItem = '';
                for(let i = 0; i < 3; i++)
                {
                    productItem += `<div class="product-box col-lg-3 mx-4">
                    <div class="product-image">
                        <img src="/php/uploads/${productData[i].productImage}" alt="">
                        <div class="like-addcart d-flex">
                            <button onClick="addToCart(${productData[i].id})"><i class="fa-solid fa-cart-plus"></i></button>
                            <button onClick="likeProduct(${productData[i].id})"><i class="fa-regular fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="product-name-price border-top pt-2">
                        <h5>${productData[i].Name}</h5>
                        <p>${productData[i].price}</p>
                    </div>
                </div>`;
                }

                $('#featureItem').html(productItem);
                
            }
            else{
                console.log(data.message);
            }
            
        }
    });

    $.ajax({
        type: "post",
        url: "/php/products.php",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        async: true,
        success:function(data){
            
            if(data.success == true){
                let AllproductData = data.data;
                let AllproductItem = '';
                for(let i in AllproductData)
                {
                    AllproductItem += `<div class="product-box col-lg-3 mx-4">
                    <div class="product-image">
                        <img src="/php/uploads/${AllproductData[i].productImage}" alt="">
                        <div class="like-addcart d-flex">
                            <button onClick="addToCart(${AllproductData[i].id})"><i class="fa-solid fa-cart-plus"></i></button>
                            <button onClick="likeProduct(${AllproductData[i].id})"><i class="fa-regular fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="product-name-price border-top pt-2">
                        <h5>${AllproductData[i].Name}</h5>
                        <p>${AllproductData[i].price}</p>
                    </div>
                </div>`;
                }

                $('#allProduct').html(AllproductItem);
                
            }
            else{
                console.log(data.message);
            }
            
        }
    });

    $.ajax({
        type: "post",
        url: "/php/categoryList.php",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        async: true,
        success:function(data){
            
            if(data.success == true){
                let category = data.data;
                let allcategory = '';
                for(let i in category)
                {
                    allcategory += `<a href="#" id="${category[i].category}">${category[i].category}</a>`;
                }

                $('#cat').html(allcategory);
                
            }
            else{
                console.log(data.message);
            }
            
        }
    });

    $('#register').click((e)=>{
          e.preventDefault();

          let name = $('#name').val();
          let  email = $('#email').val();
          let  password = $('#password').val();
          let  phoneno = $('#phoneno').val();
          let  captcha = $('#captcha').val();

          let flag = 0;

          if(name == '')
          {
            $("#error").css("display", "block");
            $("#error").text("Name is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(email == '')
          {
            $("#error").css("display", "block");
            $("#error").text("Email is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(password == ''){
            $("#error").css("display", "block");
            $("#error").text("Password is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(captcha == ''){
            $("#error").css("display", "block");
            $("#error").text("Captcha is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(phoneno == ''){
            $("#error").css("display", "block");
            $("#error").text("Phone No is required!");
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
            flag = 1;
          }

          if(flag == 0){
            let user = {
                name : name,
                email : email,
                password : password,
                phoneno : phoneno,
                captcha : captcha
              };

              $.ajax({
                type : 'POST',
                url : '/php/register.php',     
                data : user,
                dataType : 'JSON',
                success : function (data){
                    if(data.success == true)
                    {
                        $(location).attr("href", "/html/customers/home.php");
                    }
                    else{
                        $("#error").css("display", "block");
                        $("#error").text(data.message);
                        setTimeout(() => {
                          $("#error").css("display", "none");
                        }, 2000);
                    }
                }
              });
          }
    });
})

function addToCart(id){
    let customerId = getCookie("user");

    let cartItem = {
        productId : id,
        customerId : customerId,
    }

    $.ajax({
        type : 'POST',
        url : '/php/addcart.php',
        data : cartItem,
        dataType : 'JSON',
        success : function (data){

        }
    })
 }

 function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
  }