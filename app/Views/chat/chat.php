<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('public/assets/css/chat.css')?>" />
<style>
       .chat-container {
    display: flex;
    flex-direction: column;
    height: 500px;
    border: 1px solid #ddd;
    border-radius: 5px;
     background-color: #fff; 
    background-color: #e5ddd5;
}


.chat-box {
    list-style: none;
    margin: 0;
    padding: 10px;
    max-height: 400px;
    overflow-y: scroll;
    background: #f9f9f9;
}

.chat-message {
    display: flex;
    margin: 10px 0;
}

.message-right {
    justify-content: flex-end;
}

.message-left {
    justify-content: flex-start;
}

.message-box {
    max-width: 60%;
    padding: 10px;
    border-radius: 10px;
    background: #cce7f3;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}

.message-right .message-box {
    background: #cce5ff;
    text-align: right;
}

.message-left .message-box {
    background: #b9cea5;
    text-align: left;
}

.message-text {
    margin: 0;
    font-size: 14px;
    color: rgb(5, 5, 5);
}

.message-time {
    font-size: 12px;
    color: #888;
    margin-top: 5px;
    display: block;
}

.message-image {
    max-width: 150px;
    margin-top: 5px;
    border-radius: 5px;
}

.file-link {
    display: inline-block;
    margin-top: 5px;
    color: #007bff;
    text-decoration: none;
    font-size: 12px;
}

.file-link:hover {
    text-decoration: underline;
}

.file-preview-container {
    margin-top: 10px;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    background: #f8f9fa;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.file-preview-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-size: 12px;
    color: #333;
}

.preview-image {
    max-width: 100px;
    max-height: 100px;
    margin-bottom: 5px;
    border-radius: 5px;
}

.file-preview-item p {
    margin: 0;
    font-size: 12px;
}    </style>



<  <div class="container">
                <div class="page-inner">
                    <div
                        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3 text-dark">Chat</h3>
                            <h6 class="op-7  text-dark">Chat > with > staff</h6>
                        </div>
                        <div class="ms-md-auto py-2 py-md-0">

                            <!-- <a href="addstaff.php" class="btn btn-round text-uppercase"  style="background:#07193e;color:white">Add Customer</a> -->
                        </div>
                    </div>

                    <div class="content-chat mt-0 pt-0">
                        <div class="content-chat-user float-start">
                            <div class="head-search-chat">
                                <h4 class="text-center">Chat Finder</h4>
                            </div>
                            <ul id="users" class="users">
                                
    </ul>
                        </div>
                        <div id="chat-container" class="content-chat-message-user">
                            <div class="head-chat-message-user">

                                <img src="" alt="" id="chat-user-img">
                                <div class="message-user-profile">
                                    <h4 id="chat-username" class="mt-0 mb-0 text-light p-2"></h4>
                                    <small id="chat-status" class="text-white"></small>
                                </div>
                            </div>
                            <div id="chat-box" class="body-chat-message-user"></div>
                            <div id="file-preview" class="file-preview-container"></div>
                            <form id="message-form" class="message-input" enctype="multipart/form-data">
                                <textarea id="message" placeholder="Type a message..." class="w-75 rounded" name="message"></textarea>
                                <input type="hidden" id="receiver_id" name="receiver_id">
                                <input type="file" id="file-input" name="files[]" accept="image/*,application/pdf" class="d-none" multiple>
                                <label for="file-input" class="file-label d-inline">
                                    <i class="fab fa-squarespace" style="font-size: 30px; color: #07193e; cursor: pointer; padding:4px;"></i>
                                </label>

                                <button type="submit" id="send-btn" style="background-color: #07193e;" class="p-3 m-2 text-light"><i class="fa fa-paper-plane"></i></button>
                            </form>

                        </div>


                    </div>

                </div>


            </div>
<!-- footetr -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        fetchUsers();

        $(document).on('click', '.person', function() {
    const receiverId = $(this).data('user-id');
    const receiverName = $(this).data('username');
    const receiverImage = $(this).data('user-image'); 

    
    $('#receiver_id').val(receiverId);

    
    $('#chat-username').text(receiverName);

    
    const imageUrl = receiverImage ? '<?= base_url('uploads/'); ?>' + receiverImage  : 'https://www.bootdey.com/img/Content/avatar/avatar1.png';
    $('#chat-user-img').attr('src', imageUrl);

    
    $('#chat-box').empty();
    loadMessages(receiverId);
});
        function fetchUsers() {
            $.ajax({
                url: "<?= site_url('chat/getUsers'); ?>",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        const users = response.data;
                        let userHtml = '';
                        users.forEach(user => {
                            const profileImage = user.image ?
                                '<?= base_url('uploads/'); ?>' + user.image :
                                'https://www.bootdey.com/img/Content/avatar/avatar1.png';

                            const lastMessage = user.last_message ? user.last_message : '';

                            userHtml += `
                        <li class="person" data-user-id="${user.id}" data-username="${user.name}" data-user-image="${user.image}">
                            <div class="user">
                                <img src="${profileImage}" alt="${user.name}" class="w-25">
                            </div>
                            <p class="name-time">
                                <span class="name">${user.name}</span>
                                <span class="time">${lastMessage}</span>
                            </p>
                        </li>`;
                        });
                        $('#users').html(userHtml);
                    } else {
                        alert("Failed to fetch users");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching users:", error);
                }
            });
        }
        let receiverId = null;

        $(document).on('click', '.person', function() {
            receiverId = $(this).data('user-id');
            $('#receiver_id').val(receiverId);
            $('.selected-user .name').text($(this).data('username'));
            loadMessages(receiverId);
        });

        function loadMessages(receiverId) {
            $.ajax({
                url: "<?= site_url('chat/getMessages'); ?>/" + receiverId,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    let messageHtml = '';
                    const currentUserId = "<?= session()->get('user_id'); ?>";

                    response.data.forEach(message => {
                        const alignment = message.sender_id == currentUserId ? 'message-right' : 'message-left';
                        const fileHtml = renderFiles(message.files);

                        messageHtml += `
                        <li class="chat-message ${alignment}">
                        <div class="message-box">
                        <p class="message-text">${message.message}</p>
                        ${fileHtml}
                        <span class="message-time">${message.sent_at}</span>
                        </div>
                        </li>`;
                    });

                    $('#chat-box').html(messageHtml);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading messages:", error);
                }
            });
        }
        setInterval(function() {
            if (receiverId) {
                loadMessages(receiverId);
            }
        }, 1000);

        function renderFiles(files) {
            let fileHtml = '';
            if (files) {
                const fileArray = files.split(',');
                fileArray.forEach(file => {
                    const fileType = file.split('.').pop().toLowerCase();
                    const fileUrl = '<?= base_url('uploads/'); ?>' + file;

                    if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(fileType)) {
                        fileHtml += `<img src="${fileUrl}" alt="Image" class="message-image mx-2" style="height:70px;">`;
                    } else if (fileType === 'pdf') {
                        fileHtml += `<a href="${fileUrl}" target="_blank" class="file-link">View PDF</a>`;
                    } else {
                        fileHtml += `<a href="${fileUrl}" target="_blank" class="file-link">Download File</a>`;
                    }
                });
            }
            return fileHtml;
        }
        $('#file-input').on('change', function() {
            const files = $(this)[0].files;
            const fileListContainer = $('#file-preview');
            fileListContainer.empty();

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const fileType = file.type;
                const fileName = file.name;

                let fileElement;

                if (fileType.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        fileElement = `<div class="file-preview-item">
                                <img src="${e.target.result}" alt="Image" class="preview-image">
                                <p>${fileName}</p>
                               </div>`;
                        fileListContainer.append(fileElement);
                    };
                    reader.readAsDataURL(file);
                } else {
                    fileElement = `<div class="file-preview-item">
                            <p><i class="fa fa-file"></i> ${fileName}</p>
                          </div>`;
                    fileListContainer.append(fileElement);
                }
            }
        });


        $('#message-form').submit(function(e) {
            e.preventDefault();

            const formData = new FormData();
            formData.append('message', $('#message').val());
            formData.append('receiver_id', $('#receiver_id').val());

            const files = $('#file-input')[0].files;
            for (let i = 0; i < files.length; i++) {
                formData.append('files[]', files[i]);
            }

            $.ajax({
                url: "<?= site_url('chat/sendMessage'); ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        loadMessages($('#receiver_id').val());
                        $('#message').val('');
                    }
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>