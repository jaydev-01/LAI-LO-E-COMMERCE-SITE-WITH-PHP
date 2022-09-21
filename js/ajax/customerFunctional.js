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
                            <button onClick="likeProduct(${AllproductData[i].id})" id="${AllproductData[i].id}"><i class="fa-regular fa-heart"></i></button>
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
                allcategory += `<a href="#"  onClick="fetchProductCat(0)">All</a>`;
                for(let i in category)
                {
                    allcategory += `<a href="#"  onClick="fetchProductCat(${category[i].id})">${category[i].category}</a>`;
                }

                $('#cat').html(allcategory);
                
            }
            else{
                console.log(data.message);
            }
            
        }
    });

    

    $.ajax({
        type: "post",
        url: "/php/cartCount.php",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        data : {customerId : getCookie("user")},
        success : function(data){
            if(data.success == true){
                $('#totalCart').html(data.data);
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

    Count();

})

function Count(){
    $.ajax({
        type : 'POST',
        url : '/php/CountCartLiked.php',
        dataType : 'JSON',
        success : function (data){
            if(data.success == true){
                if(data.data == null){
                    $('#totallike').html("0");
                    $('#totalCart').html("0");
                }else{
                    $('#totallike').html(data.data.liked);
                    $('#totalCart').html(data.data.cart);
                }
            }else{
                console.log(data.message);
            }
        }
    });
}

function addToCart(id){
    $.ajax({
        type : 'POST',
        url : '/php/addcart.php',
        data : {productId : id},
        dataType : 'JSON',
        success : function (data){
            if(data.success == true){
                if(data.data == null){
                    $('#totalCart').html("0");
                }else{
                    $('#totalCart').html(data.data);
                }
            }else{
                console.log(data.message);
            }
        }
    })
 }

 function likeProduct(id){
    $.ajax({
        type : 'POST',
        url : '/php/addlike.php',
        data : {productId : id},
        dataType : 'JSON',
        success : function (data){
            if(data.success == true){
                if(data.data == null){
                    $('#totallike').html("0");
                }else{
                    $('#totallike').html(data.data);
                }
            }else{
                console.log(data.message);
            }
        }
    })
 }

 function fetchProductCat(id){
    $.ajax({
        type: "post",
        url: "/php/sortbycat.php",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        data : {category : id},
        async: true,
        success:function(data){
            let AllproductItem = '';
            if(data.success == true){
                let AllproductData = data.data;
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
            }
            else{
                AllproductItem += `<div class="product-box  mx-4">    
                No Product Available
            </div>`;
            }

            $('#allProduct').html(AllproductItem);
            
        }
    });
 }

 function logOut(){
    // delete_cookie("user");
    location.reload(true);
    console.log("logOut");
    $.ajax({
        type: "post",
        url: "/php/Customerlogout.php",
        dataType: "JSON",
        async: false,
        success: function (data) {
          if (data.success == true) {
            location.reload(true);
            $(location).attr("href", "/html/login.php");
          } else {
            console.log(data.message);
          }
        },
      });
 }

 var delete_cookie = function(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};
