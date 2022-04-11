$(document).ready(function() {
    $(".keywordUrl").select2({
    });
    getAllKeywords();
});

function getAllKeywords() {
    let url = BaseUrl+ "get-all-keywords";
    $.ajax({
        url: url,
        type: 'get',
        success: function(data) {
            listAllKeywords(data);
        },
        error: function() {}
    });
}

$("#addKeyword").click(function(){
    $(".validation").remove();
    let tagsValue = $("#tags").val();
    let keywordUrl = $("#keywordUrl").val();
    let url = BaseUrl+ "add-keywords";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            "tagsValue"  :tagsValue,
            "keywordUrl" : keywordUrl
        },
        dataType:"json",
        success: function(data) {
            if(data.status){
                Notiflix.Notify.success(
                    'Keyword record saved successfully.', {
                        timeout: 4000,
                    },);
                location.reload();
            }else{
                if(data.message.keywordUrl){
                    $("#select-err").append('<span class="validation">'+data.message.keywordUrl+'</span>');
                }
                if(data.message.tagsValue){
                    $("#input-err").append('<span class="validation">'+data.message.tagsValue+'</span>');
                }
            }
        },
        error: function() {}
    });
});

function listAllKeywords(data) {
    let dataSet = [];
    data = JSON.parse(data);
    let num = 1;
    let table = $(".datatable3").DataTable();
    if (data.length > 0) {
        data.forEach((e) => {
            let keyword_url = `<a href="${e.keyword_url}" target="_blank" >${e.keyword_url}</a>`;
            let action = `<a href="javascript:void(0)" class="text-danger" onclick="deleteKeyword(${e.id})" ><i class="fa fa-trash" aria-hidden="true"></i></a>`;
            let row = [
                num++,
                e.keyword,
                keyword_url,
                action
            ];
            dataSet.push(row);
        });
    }
    table.destroy();
    $(".datatable3").DataTable({
        // info: false,
        data: dataSet,
        lengthChange: false,
        // searching: false,
        pageLength: 5,
    });
}

function deleteKeyword(id) {
    //$("#deleteModel").modal("show");
    let url = BaseUrl+ "delete-keyword/" + id;
    Swal.fire({
        title: 'Delete?',
        text: "Are you sure to delete this keyword details?",
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
                        getAllKeywords();
                        Notiflix.Notify.success(
                            'Keyword deleted successfully.', {
                                timeout: 4000,
                            }, );
                    } else {
                        Notiflix.Notify.warning(
                            'Keyword does\'t exists.', {
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


