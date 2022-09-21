$(document).ready(()=>{
    cart();
    likedProduct();
    Count();
});
function deleteCart(id){
    $.ajax({
        type: "post",
        url: "/php/deleteCart.php",
        data : {cartId : id},
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success : function(data){
            if(data.success == true){
                cart();
                Count();
            }
        }
    })
}


function cart()
{
    $.ajax({
        type: "post",
        url: "/php/cartList.php",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success:function(data){
            let cartItme = '';
            let totalAmount = 0;
            if(data.success == true){
                let cartData = data.data;
                for(let key in cartData)
                {
                    console.log(cartData[key].Name);
                    cartItme += `<tr>
                    <td> <img src="/php/uploads/${cartData[key].productImage}" alt="" width="50px" height="50px"> </td>
                    <td>
                        <div class="pt-2">
                            <p>${cartData[key].Name}</p>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <button class="btn" onClick="addOne(${cartData[key].id})"><i class="fa-solid fa-plus"></i></button>
                            <div class="pt-2">${cartData[key].quantity}</div>
                            <button class="btn" onClick="minusOne(${cartData[key].id})"><i class="fa-solid fa-minus"></i></button>
                        </div>
                    </td>
                    <td>${cartData[key].price * cartData[key].quantity }</td>
                    <td> <button class="btn" onClick="deleteCart(${cartData[key].id})"> <i class="fa-solid fa-trash"></i></button> </td>
                </tr>`;
                totalAmount += cartData[key].price * cartData[key].quantity;
                }

                $('#cartTableData').html(cartItme);
                $('#totalAmount').html(totalAmount);
            }
            else{
                cartItme += `<tr>
                    <td colspan="6"> No Data Found</td>
                </tr>`;
                $('#cartTableData').html(cartItme);
                $('#totalAmount').html(totalAmount);
            }
        }
    });
}

function addOne(id){
    $.ajax({
        type: "post",
        url: "/php/addOneCart.php",
        data : {cartId : id},
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success : function(data){
            if(data.success == true){
                cart();
                Count();
            }
        }
    })
}

function minusOne(id){
    $.ajax({
        type: "post",
        url: "/php/minusOneCart.php",
        data : {cartId : id},
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success : function(data){
            if(data.success == true){
                cart();
                Count();
            }
        }
    })
}

function likedProduct(){
    $.ajax({
        type: "post",
        url: "/php/likedList.php",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success:function(data){
               let cartItme = '';
            if(data.success == true){
                let cartData = data.data;
                for(let key in cartData)
                {
                    console.log(cartData[key].Name);
                    cartItme += `<tr>
                    <td> <img src="/php/uploads/${cartData[key].productImage}" alt="" width="50px" height="50px"> </td>
                    <td>
                        <div class="pt-2">
                            <p>${cartData[key].Name}</p>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <button class="btn" onClick="addOneliked(${cartData[key].id})"><i class="fa-solid fa-plus"></i></button>
                            <div class="pt-2">${cartData[key].quantity}</div>
                            <button class="btn" onClick="minusOneliked(${cartData[key].id})"><i class="fa-solid fa-minus"></i></button>
                        </div>
                    </td>
                    <td>${cartData[key].price * cartData[key].quantity }</td>
                    <td> <button class="btn" onClick="deleteLiked(${cartData[key].id})"> <i class="fa-solid fa-trash"></i></button> </td>
                    <td> <button class="btn" onClick="addToCart(${cartData[key].id})"> <i class="fa-sharp fa-solid fa-cart-plus"></i></button> </td>
                </tr>`;
                }

                $('#likedData').html(cartItme);
            }
            else{
                cartItme += `<tr>
                    <td colspan="6"> No Data Found</td>
                </tr>`;
                $('#likedData').html(cartItme);
            }
            
        }
    });
}


function addOneliked(id){
    $.ajax({
        type: "post",
        url: "/php/addOneLiked.php",
        data : {cartId : id},
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success : function(data){
            if(data.success == true){
                likedProduct();
                Count();
            }
        }
    })
}

function minusOneliked(id){
    $.ajax({
        type: "post",
        url: "/php/minusOneLiked.php",
        data : {cartId : id},
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success : function(data){
            if(data.success == true){
                likedProduct();
                Count();
            }
            else{
                console.log(data.message);
            }
        }
    })
}

function deleteLiked(id){
    $.ajax({
        type: "post",
        url: "/php/deleteLiked.php",
        data : {cartId : id},
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success : function(data){
            if(data.success == true){
                likedProduct();
                Count();
            }else{
                console.log(data.message);
            }
        }
    })
}

function addToCart(id){
    $.ajax({
        type: "post",
        url: "/php/addToCart.php",
        data : {cartId : id},
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success : function(data){
            if(data.success == true){
                likedProduct();
                Count();
            }else{
                console.log(data.message);
            }
        }
    })
}

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