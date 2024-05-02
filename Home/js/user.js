$(document).ready(function () {
    
    load_users_follow();

    function load_users_follow()
    {
        let data = {
            'load_user':true
        }
        $.ajax({
            type: "POST",
            url:  "./Code/follow.php",
            data: data,
            success: function (response) {
                console.log(response);
                $('.followers_container').html("");

                $.each(response, function (key, value) { 

                    $('.followers_container').append('<div class="user-follow-con">\
                    <p>'+value.users['name']+'</p> <button class="follow follow_btn" value ='+value.users['user_id']+'>Follow</button>\
                </div>\
                    ');
                     
                });

            }
        });
    }


    $(document).on('click','.follow_btn', function (e) {
        e.preventDefault();

        let click = $(this);

        $userid = click.val();

        let data = {
            'userid':$userid,
            'follow_btn':true
        }

        $.ajax({
            type: "POST",
            url: "./Code/follow.php",
            data: data,
            success: function (response) {
                alert(response);
            }
        });

        
    });
});