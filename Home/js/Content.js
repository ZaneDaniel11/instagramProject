$(document).ready(function () {
    // Load content on page load
    Content();

    function Content() {
        let data = {
            'Load_Content': true
        };
    
        $.ajax({
            type: "POST",
            url: "./Code/content.php",
            data: data,
            success: function (response) {
                console.log(response);
                $('.content-container').empty(); // Clear existing content
    
                if (Array.isArray(response)) { 
                    response.forEach(function (value) {
                        console.log(value.content.image);
    
                        let imagesHTML = '';
                        var images = JSON.parse(value.content.image);
    
                        if (images.length > 1) { 
                            images.forEach(function (image) {
                                imagesHTML += '<div class="image-Container d-flex align-content-stretch flex-nowrap"><img src="Code/uploads/' + image + '" alt="image1"></div>';
                            });
                        } else {
                            imagesHTML += '<img src="Code/uploads/' + images + '" alt="image">';
                        }
    
                        let contentHTML = '\
                            <div class="post-header d-flex justify-content-between">\
                                <input type="text" class="content_content" value=" '+ value.content.content + '">\
                                <div><img src="../car-5186291.jpg" alt="Profile Picture" class="profile-pic">\
                                    <span class="username">' + value.user.name + '</span>\
                                </div>\
                                <div>\
                                    <button class="edit_content_btn" value="' + value.content.content_id + '">edit</button>\
                                </div>\
                                <div>\
                                    <button class="delete_content_btn" value="' + value.content.content_id + '">X</button>\
                                </div>\
                            </div>\
                            <div class="post-Container d-flex  flex-nowrap">\
                                ' + imagesHTML + '\
                            </div>\
                            <div class="post-actions">\
                            </div>\
                            <div class="post-likes">\
                                100 likes\
                            </div>\
                            <div class="post-caption">\
                                <span class="username">' + value.user.name + '</span>\
                                <p >'+value.content.content+'</p>\
                            </div>\
                            <div class="post-comments">\
                            </div>\
                            <div class="post-timestamp">\
                                ' + value.content.created + '\
                            </div>\
                            <div class="add-comment">\
                                <input type="text" placeholder="Add a comment..." class="comment-input">\
                                <button class="post-btn">Post</button>\
                            </div>\
                        ';
    
                        $('.content-container').append(contentHTML);
                    });
                } else {
                    console.log('Invalid response format.');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }
    

    $(document).on('click', '.delete_content_btn', function (e) {
        e.preventDefault();

        var clicked = $(this);
        var delete_content  = clicked.val();

        var data = {
            'content': delete_content,
            'submit_delete':true
        };

        $.ajax({
            type: "POST",
            url: "./Code/content.php",
            data: data,
            success: function (response) {
                location.reload();
            }
        });
    });
});
