/*
Author : Monita
Create Date:08/03/2018
*/

jQuery(document).ready(function () {

});


function fb_share(userId, link, social, urlPayment, postId){
    FB.ui(
        {
            method: 'share',
            href: link,
        },
        // callback
        function(response) {
            if (response && !response.error_message) {
                if(userId !== 0 ){
                    jQuery.ajax({
                        type: 'POST',
                        url: urlPayment,
                        data: {userId: userId ,
                               social: social ,
                               postId : postId,
                               link: link
                                },
                        dataType: 'json',
                        success:function(result){
                            // do stuff with json (in this case an array)
                            if ( result.status == true ) {
                                swal({
                                    title: "Chúc mừng bạn",
                                    text: "Bạn vừa được chúng tôi tạm tính "+result.data.money +" vnđ vào tài khoản.",
                                    icon: "success",
                                });

                            } else {
                                swal({
                                    title: "Lỗi",
                                    text: "Bạn chỉ được tính tiền share một lần cho bài viết hoặc chiến dịch đã kết thúc.",
                                    icon: "error",
                                });
                            }

                        },
                        error:function(){
                            alert("Error");
                        }
                    });
                }
            } else {
               // alert('Error while posting.');
            }
        }
    );



}