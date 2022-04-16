$(document).ready(function() {
    getPartnersList();
});

function getPartnersList(token = null){  
    $(".loader-wrapper").show();
    let url = BaseUrl+"curl/get-all-partners";
    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(result) {
            loadClientsData(result);
        },
        error: function(error, data) {
            $(".loader-wrapper").hide();
        }
    })
}


function changeStatus(id){
    $(".loader-wrapper").show();
    let url = BaseUrl+"curl/change-partner-status/"+id;
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data:{
            id:id
        },
        success: function(result) {
            if(result){
                getPartnersList()
                $(".loader-wrapper").hide();
            }
        },
        error: function(error, data) {
            $(".loader-wrapper").hide();
        }
    })
    // $.ajax({
    //     url: "https://partners.thewingshield.com/partners/change-status",
    //     type: 'post',
    //     dataType: 'json',
    //     headers: {
    //         'email': emails,
    //         'password': pass
    //     },
    //     data:{
    //         id:id
    //     },
    //     // crossdomain: true,
    //     success: function(result) {
    //         if(result){
    //             getPartnersList()
    //         }
    //     },
    //     error: function(error, data) {
    //         $(".loader-wrapper").hide();
    //     }
    // })
}

    

function loadClientsData(result) {
    let table = $(".datatable").DataTable();
    let dataSet = [];
    let num =1;
    if(result.status){
        result = result.data;
        if(result.length>0){
            result.forEach((e) => {
                let action = `<a href="javascript:void(0)" class="text-danger" onclick="deletePartner(${e.id}, '${e.user_email}')"><i class="fa fa-trash"></i> Delete</a>`;
                let status = '';
                if(e.status=="1"){
                    status = `<div class="form-check form-switch" onclick="changeStatus(${e.id})">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault${e.id}" checked>
                        <label class="form-check-label" for="flexSwitchCheckDefault${e.id}">Active</label>
                        </div>`;
                }else{
                    status = `<div class="form-check form-switch" onclick="changeStatus(${e.id})">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault${e.id}">
                        <label class="form-check-label" for="flexSwitchCheckDefault${e.id}">Deactive</label>
                        </div>`;
                }
                
                let logo = "";
                if(e.company_logo){
                    logo = `<a href="https://partners.thewingshield.com/public/uploads/parnters_company_logo/${e.company_logo}" target="_black"> <img src="https://partners.thewingshield.com/public/uploads/parnters_company_logo/${e.company_logo}" class="img-fluid" width="150"><a/>`;
                }else{
                    logo = `<a href="${BaseUrl}assets/img/empty.jpg" target="_black"><img src="${BaseUrl}assets/img/empty.jpg" class="img-fluid" width="150"><a/>`;
                }
                
                let websiteURL = "";
                if(e.website_URL){
                    websiteURL = `<a href="${e.website_URL}" target="_black"> ${e.website_URL} <a/>`;
                }
                
                let facebookLink = "";
                if(e.facebook_link){
                    facebookLink = `<a href="${e.facebook_link}" target="_black"> ${e.facebook_link} <a/>`;
                }
                
                let twitterLink = "";
                if(e.twitter_link){
                    twitterLink = `<a href="${e.twitter_link}" target="_black"> ${e.twitter_link} <a/>`;
                }
                
                let googlePlus = "";
                if(e.google_plus){
                    googlePlus = `<a href="${e.google_plus}" target="_black"> ${e.google_plus} <a/>`;
                }
                
                let linkedInUrl = "";
                if(e.linkedIn){
                    linkedInUrl = `<a href="${e.linkedIn}" target="_black"> ${e.linkedIn} <a/>`;
                }
                
                let row = [
                    num++,
                    e.user_name,
                    e.user_email,
                    e.user_phone,
                    status,
                    e.role_title,
                    logo,
                    e.company_name,
                    e.company_profile,
                    e.company_address,
                    e.company_phone_no,
                    websiteURL,
                    facebookLink,
                    twitterLink,
                    googlePlus,
                    linkedInUrl,
                    e.user_created_at,
                    action,
                ];
                dataSet.push(row);
            })
        }
    }
    table.destroy();
    $(".datatable").DataTable({
        data: dataSet,
        pageLength: 10,
        dom: 'lBfrtip',
    });
    $(".loader-wrapper").hide();
}

$("#saveParnter").click(function(){
    $(".validation").remove();
    //let url = "https://partners.thewingshield.com/partners/add-partner";
    
    // form_data.append("file", file_data);
    // form_data.append("name", name);
    let flag = true;

    if($("#name").val()==""){
        $("#name").addClass('input-error');
        $("#name").parent().append('<span class="text-danger validation">Please enter name.</span>');
        flag = false;
    }

    if($("#email").val()==""){
        $("#email").addClass('input-error');
        $("#email").parent().append('<span class="text-danger validation">Please enter email.</span>');
        flag = false;
    }

    if($("#phone").val()==""){
        $("#phone").addClass('input-error');
        $("#phone").parent().append('<span class="text-danger validation">Please enter phone number.</span>');
        flag = false;
    }

    if($("#password").val()==""){
        $("#password").addClass('input-error');
        $("#password").parent().append('<span class="text-danger validation">Please enter password.</span>');
        flag = false;
    } 

    if($("#confirmPassword").val()==""){
        $("#confirmPassword").addClass('input-error');
        $("#confirmPassword").parent().append('<span class="text-danger validation">Please enter confirm password.</span>');
        flag = false;
    }

    if($("#password").val()!="" && $("#confirmPassword").val()!="" && $("#confirmPassword").val() != $("#password").val()){
        $("#confirmPassword").addClass('input-error');
        $("#confirmPassword").parent().append('<span class="text-danger validation">Password and confirm password are not matched.</span>');
        flag = false;
    }

    if($("#companyName").val()==""){
        $("#companyName").addClass('input-error');
        $("#companyName").parent().append('<span class="text-danger validation">Please enter company name.</span>');
        flag = false;
    }

    if($("#companyAddress").val()==""){
        $("#companyAddress").addClass('input-error');
        $("#companyAddress").parent().append('<span class="text-danger validation">Please enter company Address.</span>');
        flag = false;
    }

    if($("#companyPhone").val()==""){
        $("#companyPhone").addClass('input-error');
        $("#companyPhone").parent().append('<span class="text-danger validation">Please enter company phone number.</span>');
        flag = false;
    }

    if($("#websiteUrl").val()==""){
        flag = false;
        $("#websiteUrl").addClass('input-error');
        $("#websiteUrl").parent().append('<span class="text-danger validation">Please enter website url.</span>');
    }

    var file = document.getElementById("companyLogo");
    if (file.files.length == 0) {
        flag = false;
        $("#companyLogo").addClass('input-error');
        $("#companyLogo").parent().append('<span class="text-danger validation">Please select logo image.</span>');
    } 


    // if(data.messages.websiteUrl){
    //     $("#confirmPassword").addClass('input-error');
    //     $("#confirmPassword").parent().append('<span class="text-danger validation">'+data.messages.confirmPassword+'</span>');
    // }

    
    if(flag){
        let url = BaseUrl+"curl/add-partner";
        var data = document.getElementById('add-parter-form');
        var form_data = new FormData(data);
        $(".loader-wrapper").hide();
        $.ajax({
            url:url,
            headers: {
                'email':emails,
                'password':pass,  
            },
            data: form_data,
            dataType:"json",
            type:"post",
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.status!="400"){
                    $(".loader-wrapper").hide();
                    Swal.fire("Success!", "Partner created successfully!", "success");
                    $("#add-parter-form").trigger('reset');
                    $('.close').trigger('click');
                    getPartnersList();
                }else{
                    if(data.messages.companyAddress){
                        $("#companyAddress").addClass('input-error');
                        $("#companyAddress").parent().append('<span class="text-danger validation">'+data.messages.companyAddress+'</span>');
                    }
        
                    if(data.messages.companyName){
                        $("#companyName").addClass('input-error');
                        $("#companyName").parent().append('<span class="text-danger validation">'+data.messages.companyName+'</span>');
                    }
        
                    if(data.messages.companyPhone){
                        $("#companyPhone").addClass('input-error');
                        $("#companyPhone").parent().append('<span class="text-danger validation">'+data.messages.companyPhone+'</span>');
                    }
        
                    if(data.messages.companyProfile){
                        $("#companyProfile").addClass('input-error');
                        $("#companyProfile").parent().append('<span class="text-danger validation">'+data.messages.companyProfile+'</span>');
                    }
        
                    if(data.messages.companyLogo){
                        $("#companyLogo").addClass('input-error');
                        $("#companyLogo").parent().append('<span class="text-danger validation">'+data.messages.companyLogo+'</span>');
                    }
        
                    if(data.messages.email){
                        $("#email").addClass('input-error');
                        $("#email").parent().append('<span class="text-danger validation">'+data.messages.email+'</span>');
                    }
        
                    if(data.messages.facebookLink){
                        $("#facebookLink").addClass('input-error');
                        $("#facebookLink").parent().append('<span class="text-danger validation">'+data.messages.facebookLink+'</span>');
                    }
        
                    if(data.messages.googleplus){
                        $("#googleplus").addClass('input-error');
                        $("#googleplus").parent().append('<span class="text-danger validation">'+data.messages.googleplus+'</span>');
                    }
        
                    if(data.messages.linkedIn){
                        $("#linkedIn").addClass('input-error');
                        $("#linkedIn").parent().append('<span class="text-danger validation">'+data.messages.linkedIn+'</span>');
                    }
        
                    if(data.messages.name){
                        $("#name").addClass('input-error');
                        $("#name").parent().append('<span class="text-danger validation">'+data.messages.name+'</span>');
                    }
        
                    if(data.messages.phone){
                        $("#phone").addClass('input-error');
                        $("#phone").parent().append('<span class="text-danger validation">'+data.messages.phone+'</span>');
                    }
        
                    if(data.messages.websiteUrl){
                        $("#websiteUrl").addClass('input-error');
                        $("#websiteUrl").parent().append('<span class="text-danger validation">'+data.messages.websiteUrl+'</span>');
                    }
                    if(data.messages.password){
                        $("#password").addClass('input-error');
                        $("#password").parent().append('<span class="text-danger validation">'+data.messages.password+'</span>');
                    }
                    if(data.messages.confirmPassword){
                        $("#confirmPassword").addClass('input-error');
                        $("#confirmPassword").parent().append('<span class="text-danger validation">'+data.messages.confirmPassword+'</span>');
                    }
                    $(".loader-wrapper").hide();
                }
                
            },
            error:function(error, exh){
                if(error.responseJSON.messages.companyAddress){
                    $("#companyAddress").addClass('input-error');
                    $("#companyAddress").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.companyAddress+'</span>');
                }

                if(error.responseJSON.messages.companyName){
                    $("#companyName").addClass('input-error');
                    $("#companyName").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.companyName+'</span>');
                }

                if(error.responseJSON.messages.companyPhone){
                    $("#companyPhone").addClass('input-error');
                    $("#companyPhone").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.companyPhone+'</span>');
                }

                if(error.responseJSON.messages.companyProfile){
                    $("#companyProfile").addClass('input-error');
                    $("#companyProfile").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.companyProfile+'</span>');
                }

                if(error.responseJSON.messages.companyLogo){
                    $("#companyLogo").addClass('input-error');
                    $("#companyLogo").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.companyLogo+'</span>');
                }

                if(error.responseJSON.messages.email){
                    $("#email").addClass('input-error');
                    $("#email").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.email+'</span>');
                }

                if(error.responseJSON.messages.facebookLink){
                    $("#facebookLink").addClass('input-error');
                    $("#facebookLink").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.facebookLink+'</span>');
                }

                if(error.responseJSON.messages.googleplus){
                    $("#googleplus").addClass('input-error');
                    $("#googleplus").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.googleplus+'</span>');
                }

                if(error.responseJSON.messages.linkedIn){
                    $("#linkedIn").addClass('input-error');
                    $("#linkedIn").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.linkedIn+'</span>');
                }

                if(error.responseJSON.messages.name){
                    $("#name").addClass('input-error');
                    $("#name").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.name+'</span>');
                }

                if(error.responseJSON.messages.phone){
                    $("#phone").addClass('input-error');
                    $("#phone").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.phone+'</span>');
                }

                if(error.responseJSON.messages.companyAddress){
                    $("#twitterLink").addClass('input-error');
                    $("#twitterLink").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.twitterLink+'</span>');
                }

                if(error.responseJSON.messages.websiteUrl){
                    $("#websiteUrl").addClass('input-error');
                    $("#websiteUrl").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.websiteUrl+'</span>');
                }
                if(error.responseJSON.messages.password){
                    $("#password").addClass('input-error');
                    $("#password").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.password+'</span>');
                }
                if(error.responseJSON.messages.confirmPassword){
                    $("#confirmPassword").addClass('input-error');
                    $("#confirmPassword").parent().append('<span class="text-danger validation">'+error.responseJSON.messages.confirmPassword+'</span>');
                }
                $(".loader-wrapper").hide();
            }
        });
    }
});

    $("#name").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#email").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#phone").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#companyLogo").change(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#companyAddress").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#companyName").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#companyPhone").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#companyProfile").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#facebookLink").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#googleplus").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#linkedIn").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#twitterLink").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#websiteUrl").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#password").keyup(function(){
        $(this).parent().find('.validation').remove();
    });
    $("#confirmPassword").keyup(function(){
        $(this).parent().find('.validation').remove();
    });

    $("#companyLogo").change(function(e) {
        display(this);
    })

function display(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(event) {
            $('#ajaxImgUpload').attr('src', event.target.result);
        }
        //$("#oldPhotoName").val("");
        reader.readAsDataURL(input.files[0]);
    }else{
        $('#ajaxImgUpload').attr('src', "https://via.placeholder.com/100");
    }
}

$('#addParterModal').on('hidden.bs.modal', function (e) {
    $("#add-parter-form").trigger('reset');
})

function deletePartner(id=null, user_email=null){
    if(id && user_email){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to delete "+user_email+" clients.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $(".loader-wrapper").hide();
                let url = BaseUrl+"curl/delete-partner/"+id;
                $.ajax({
                    url:url,
                    type:"delete",
                    dataType: 'json',
                    success:function(data){
                        if(data.status){
                            $(".loader-wrapper").hide();
                            Swal.fire("Success!", data.message, "success");
                            getPartnersList();
                        }else{
                            Swal.fire("Error!", data.message, "error");
                            $(".loader-wrapper").hide();
                        }
                        
                    },
                    error:function(){
                        $(".loader-wrapper").hide();
                    }
                });
            }
        })
    }
}

$('#addPartnerModal').on('hidden.bs.modal', function (e) {
    $(".validation").remove();
    $('#add-parter-form').trigger("reset");
})

