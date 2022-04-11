$(document).ready(function() {
    if ($("#target").val() == "1") {
        // $("#target").click();
        var myOffcanvas = document.getElementById('offcanvasRight')
        var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
        bsOffcanvas.show()
        // $('#offcanvasRight').Offcanvas('show');
    }

    if ($("#target").val() == "s") {
        Notiflix.Notify.success(
            'Record saved successfully.', {
                timeout: 4000,
            }, );
    }
    getAllPost();
});

function getAllPost() {
    let url = BaseUrl+ "get-all-posts";
    $.ajax({
        url: url,
        type: 'get',
        success: function(data) {
            listAllPost(data);
        },
        error: function() {}
    });

}

function listAllPost(data) {
    let dataSet = [];
    data = JSON.parse(data);
    let num = 1;
    let table = $(".datatable2").DataTable();
    if (data.length > 0) {
        data.forEach((e) => {
            if (e.image) {
                var img = BaseUrl+`uploads/post_images/${e.image}`;
            } else {
                var img = BaseUrl+`/empty.jpg`;
            }
            let postUrl = `<a href="${e.post_url}" target="_blank" >${e.post_url}</a>`;
            let image = `<a href="${img}" target="_blank" ><img width="100" src="${img}" /></a>`;
            let youtubeUrl = `<a href="${e.youtube_url}" target="_blank" >${e.youtube_url}</a>`;
            let action = `<a href="javascript:void(0)" class="text-danger" onclick="deletePost(${e.id})" ><i class="fa fa-trash" aria-hidden="true"></i></a>`;
            let row = [
                num++,
                postUrl,
                image,
                youtubeUrl,
                e.description,
                action
            ];
            dataSet.push(row);
        });
    }
    table.destroy();
    $(".datatable2").DataTable({
        // info: false,
        data: dataSet,
        lengthChange: false,
        // searching: false,
        pageLength: 5,
    });
}

function deletePost(id) {
    //$("#deleteModel").modal("show");
    let url = BaseUrl+ "delete-post/" + id;
    Swal.fire({
        title: 'Delete?',
        text: "Are you sure to delete this post and updates?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'delete',
                success: function(data) {
                    if (data) {
                        getAllPost();
                        Notiflix.Notify.success(
                            'Post deleted successfully.', {
                                timeout: 4000,
                            }, );
                        $("#deleteModel").modal("hide");
                        getAllPost();
                    } else {
                        Notiflix.Notify.warning(
                            'Post does\'t exists.', {
                                timeout: 4000,
                            }, );
                    }
                },
                error: function(data) {
                }
            });
        }
    })
}

$("#deletePost").click(function() {
    let id = $("#delId").val();
    let url = BaseUrl+ "delete-post/" + id;
    $.ajax({
        url: url,
        type: 'delete',
        success: function(data) {
            if (data) {
                Notiflix.Notify.success(
                    'Post deleted successfully.', {
                        timeout: 4000,
                    }, );
                $("#deleteModel").modal("hide");
                getAllPost();
            } else {
                Notiflix.Notify.warning(
                    'Post does\'t exists.', {
                        timeout: 4000,
                    }, );
            }

        },
        error: function(data) {

        }
    });
});
