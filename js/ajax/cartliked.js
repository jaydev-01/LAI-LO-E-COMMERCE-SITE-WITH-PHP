$(document).ready(()=>{

    $.ajax({
        type: "post",
        url: "/php/cartList.php",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        async: true,
        success:function(data){
            
            if(data.success == true){
                let cartData = data.data;
                let cartItme = '';
                for(let key in cartData)
                {
                    cartItme += `<tr>
                    <td> <img src="/images/img_1.webp" alt="" width="50px" height="50px"> </td>
                    <td>
                        <div class="pt-2">
                            <p>${cartData[key].productName}</p>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <button class="btn"><i class="fa-solid fa-plus"></i></button>
                            <div class="pt-2">1</div>
                            <button class="btn"><i class="fa-solid fa-minus"></i></button>
                        </div>
                    </td>
                    <td>${cartData[key].totalPrice}</td>
                    <td> <button class="btn" id="${cartData[key].id}"> <i class="fa-solid fa-trash"></i></button> </td>
                </tr>`;
                }

                $('# ').html(cartItme);
                
            }
            else{
                console.log(data.message);
            }
            
        }
    });

})