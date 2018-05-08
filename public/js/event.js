
// var BASE_URL = window.location.hostname + ":8000/";

function showErrors(errorMessage, errormap, errorlist) {
    var val = this;
    errormap.forEach(function(error, index) {
        val.settings.highlight.call(val, error.element, val.settings.errorClass, val.settings.validClass);
        $(error.element).siblings("span.field-validation-valid, span.field-validation-error").html($("<span></span>").html(error.message)).addClass("field-validation-error").removeClass("field-validation-valid").show();
    });
}

$('#pageTable tbody').on( 'click', '#edit', function () {
    var data = $('#pageTable').DataTable().row( $(this).parents('tr') ).data();
    $('#no_asset').val(data['NO_ASSET']);
    $('#no_equipment').val(data['NO_EQUIPMENT']);
    $('#description').val(data['DESCRIPTION']);
    $('#mic').val(data['MIC']);
    $('#book_val').val(data['BOOK_VALUE']);
    $('#category').val(data['CATEGORY']);
    $('#parent').val(data['PARENT']).trigger('change');
    $('#location').val(data['LOCATION']).trigger('change');
    $('#myModal').modal('toggle');
    $('#updateInvent').show();
    $('#storeInvent').hide();
} );

$('#tableLoc tbody').on( 'click', '#edit', function () {
    var data = $('#tableLoc').DataTable().row( $(this).parents('tr') ).data();
    $('#loc_name').val(data['LOC_NAME']);
    $('#id').val(data['ID']);
    $('#locModal').modal('toggle');
    $('#updateLoc').show();
    $('#storeLoc').hide();
} );

$('#tableOrtu tbody').on( 'click', '#edit', function () {
    var data = $('#tableOrtu').DataTable().row( $(this).parents('tr') ).data();
    $('#ortu').val(data['ORTU']);
    $('#id').val(data['ID']);
    $('#locModal').modal('toggle');
    $('#updateOrtu').show();
    $('#storeOrtu').hide();
} );

$('#tableCategory tbody').on( 'click', '#edit', function () {
    var data = $('#tableCategory').DataTable().row( $(this).parents('tr') ).data();
    $('#category').val(data['CATEGORY']);
    $('#id').val(data['ID']);
    $('#CategoryModal').modal('toggle');
    $('#updateCategory').show();
    $('#storeCategory').hide();
} );

$('#userTable tbody').on( 'click', '#edit', function () {
    var data = $('#userTable').DataTable().row( $(this).parents('tr') ).data();
    $('#name').val(data['name']);
    $('#id').val(data['user_id']);
    $('#role-level').val(data['role']).trigger('change');
    $('#myModal').modal('toggle');
} );

$("select").select2({
            placeholder: function () {
                $(this).data('placeholder');
            },
            width:'100%'
        });

function insertData(){
    $('#no_equipment').removeAttr("readonly");
    $('#no_asset').val("");
    $('#no_equipment').val("");
    $('#description').val("");
    $('#mic').val("");
    $('#book_val').val("");
    $('#category').val("");
    $('#parent').val("");
    $('#location').val("");
    $('#figure').val("");
    $('#updateInvent').hide();
    $('#storeInvent').show();
    $('#myModal').modal('toggle');
}

function insertOrtu(){
    $('#ortu').val('');
    $('#id').val('');
    $('#locModal').modal('toggle');
    $('#updateOrtu').hide();
    $('#storeOrtu').show();
}

function insertLocation(){
    $('#loc_name').val('');
    $('#id').val('');
    $('#locModal').modal('toggle');
    $('#updateLoc').hide();
    $('#storeLoc').show();
}

function insertCategory(){
    $('#category').val('');
    $('#id').val('');
    $('#CategoryModal').modal('toggle');
    $('#updateCategory').hide();
    $('#storeCategory').show();
}

function delet(id) {
    swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            var url = BASE_URL + "/delet-inventory/" + id; 
                            $.ajax({
                                url      : url,
                                dataType : "JSON",
                                method   : "GET",
                                success  : function(response) {
                                    // alert('yo');
                                    if (response == '1') {
                                        swal({
                                              title: "Good job!",
                                              text: "You have delete the data!",
                                              icon: "success",
                                              button: "Aww yiss!",
                                            });
                                        $('#pageTable').DataTable().draw();
                                        drawChart();
                                    } 
                                },
                                error : function(response) {
                                }
                            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
}

function insertDataAsset(){
            
            $("#formInput").validate({
            ignore: [],
            debug:true,
            rules : {
                // no_asset : "required",
                no_equipment : "required",
                description : "required",
                // mic : "required",
                // book_val : "required",
                category : "required",
                parent : "required",
                location : "required",
                condition : "required",
                // figure : {
                //     required: true
                // },
            },
            messages : {
                // no_asset : "number asset is required !",
                no_equipment: "number equipment is required !",
                description : "Description is required !",
                // mic : "MIC is required !",
                // book_val : "Book Value is required !",
                category : "Category is required !",
                parent : "Parent is required !",
                location : "Location is required !",
                condition : "Condition is required !",
                // figure : {
                //     required : "Figure is required !",
                // },
                    
            },
            errorElement: 'span',
            errorClass: 'help-block text-red',
            submitHandler: function() {
                fdata = new FormData($('form#formInput')[0]);
                    $.ajax({
                        type: "POST",
                        url: BASE_URL + "/post-data-inventory",
                        dataType: 'JSON',
                        data: fdata,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(msg){
                            var validator = {};
                            if (msg == '0'){
                                var $validator = $("#formInput").validate();
                                var errors;

                                /* Build up errors object, name of input and error message: */
                                errors = { no_equipment: "Nomor equipment sudah terdaftar" };
                                /* Show errors on the form */
                                $validator.showErrors(errors);
                            } else {
                                swal({
                                      title: "Success!",
                                      text: "Your data have ben save!",
                                      icon: "success",
                                      button: "OK!",
                                    });
                                $('#no_asset').val("");
                                $('#no_equipment').val("");
                                $('#description').val("");
                                $('#mic').val("");
                                $('#book_val').val("");
                                $('#category').val("");
                                $('#parent').val("");
                                $('#location').val("");
                                $('#figure').val("");
                                $('#pageTable').DataTable().draw();
                                drawChart();
                            }
                        },
                        error: function(){
                            swal({
                              title: "Error!",
                              text: "Operation failed",
                              icon: "error",
                              button: "OK!",
                            });
                        }
                    });
                }
            });
        }

    function updatetDataAsset(){
            
        $("#formInput").validate({
        ignore: [],
        debug:true,
        rules : {
            no_asset : "required",
            no_equipment : "required",
            description : "required",
            mic : "required",
            book_val : "required",
            category : "required",
            parent : "required",
            location : "required",
            condition : "required"
        },
        messages : {
            no_asset : "number asset is required !",
            no_equipment: "number equipment is required !",
            description : "Description is required !",
            mic : "MIC is required !",
            book_val : "Book Value is required !",
            category : "Category is required !",
            parent : "Parent is required !",
            location : "Location is required !",
            condition : "Condition is required !",
        },
        errorElement: 'span',
        errorClass: 'help-block text-red',
        submitHandler: function() {
            fdata = new FormData($('form#formInput')[0]);
                $.ajax({
                    type: "POST",
                    url: BASE_URL + '/post-update-inventory',
                    dataType: 'JSON',
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(msg){
                        var validator = {};
                        if (msg == '0'){
                            var $validator = $("#formInput").validate();
                            var errors;

                            /* Build up errors object, name of input and error message: */
                            errors = { no_asset: "Nomor asset sudah terdaftar" };
                            /* Show errors on the form */
                            $validator.showErrors(errors);
                        } else {
                            swal({
                                  title: "Success!",
                                  text: "Your data have ben update!",
                                  icon: "success",
                                  button: "OK!",
                                });
                            $('#no_asset').val("");
                            $('#no_equipment').val("");
                            $('#description').val("");
                            $('#mic').val("");
                            $('#book_val').val("");
                            $('#category').val("");
                            $('#parent').val("");
                            $('#location').val("");
                            $('#figure').val("");
                            $('#pageTable').DataTable().draw();
                            drawChart();
                            $('#myModal').modal('toggle');
                        }
                    },
                    error: function(){
                        swal({
                              title: "Error!",
                              text: "Operation failed",
                              icon: "error",
                              button: "OK!",
                            });
                    }
                });
            }
        });
    }

    function insertDataLoc(){
            
            $("#fLocation").validate({
            ignore: [],
            debug:true,
            rules : {
                loc_name : "required",
            },
            messages : {
                loc_name : "number asset is required !",                    
            },
            errorElement: 'span',
            errorClass: 'help-block text-red',
            submitHandler: function() {
                fdata = new FormData($('form#fLocation')[0]);
                $.ajax({
                    type: "POST",
                    url: BASE_URL + '/post-location',
                    dataType: 'JSON',
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(msg){
                        var validator = {};
                        if (msg == '0'){
                            var $validator = $("#fLocation").validate();
                            var errors;

                            /* Build up errors object, name of input and error message: */
                            errors = { loc_name: "Nomor asset sudah terdaftar" };
                            /* Show errors on the form */
                            $validator.showErrors(errors);
                        } else {
                            swal({
                                  title: "Success!",
                                  text: "Your data have ben save!",
                                  icon: "success",
                                  button: "OK!",
                                });
                            $('#loc_name').val("");
                            $('#tableLoc').DataTable().draw();
                        }
                    },
                    error: function(){
                        swal({
                              title: "Error!",
                              text: "Operation failed",
                              icon: "error",
                              button: "OK!",
                            });
                    }
                });
            }
        });
    }

    function updateDataLoc(){
            
            $("#fLocation").validate({
            ignore: [],
            debug:true,
            rules : {
                loc_name : "required",
            },
            messages : {
                loc_name : "number asset is required !",                    
            },
            errorElement: 'span',
            errorClass: 'help-block text-red',
            submitHandler: function() {
                fdata = new FormData($('form#fLocation')[0]);
                $.ajax({
                    type: "POST",
                    url: BASE_URL + '/update-location',
                    dataType: 'JSON',
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(msg){
                        var validator = {};
                        if (msg == '0'){
                            var $validator = $("#fLocation").validate();
                            var errors;

                            /* Build up errors object, name of input and error message: */
                            errors = { loc_name: "Nomor asset sudah terdaftar" };
                            /* Show errors on the form */
                            $validator.showErrors(errors);
                        } else {
                            swal({
                                  title: "Success!",
                                  text: "Your data have ben update!",
                                  icon: "success",
                                  button: "OK!",
                                });
                            $('#loc_name').val("");
                            $('#tableLoc').DataTable().draw();
                            $('#myModal').modal('toggle');
                        }
                    },
                    error: function(){
                        swal({
                              title: "Error!",
                              text: "Operation failed",
                              icon: "error",
                              button: "OK!",
                            });
                    }
                });
            }
        });
    }

    function deletLoc(id) {
        swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                var url = BASE_URL + "/delet-location/" + id; 
                                $.ajax({
                                    url      : url,
                                    dataType : "JSON",
                                    method   : "GET",
                                    success  : function(response) {
                                        // alert('yo');
                                        if (response == '1') {
                                            swal({
                                                  title: "Good job!",
                                                  text: "You have delete the data!",
                                                  icon: "success",
                                                  button: "Aww yiss!",
                                                });
                                            $('#tableLoc').DataTable().draw();
                                        } 
                                    },
                                    error : function(response) {
                                    }
                                });
              } else {
                swal("Your imaginary file is safe!");
              }
            });
    }

    function insertDataOrtu(){
            
            $("#fOrtu").validate({
            ignore: [],
            debug:true,
            rules : {
                ortu : "required",
            },
            messages : {
                ortu : " Parent name is required !",                    
            },
            errorElement: 'span',
            errorClass: 'help-block text-red',
            submitHandler: function() {
                fdata = new FormData($('form#fOrtu')[0]);
                $.ajax({
                    type: "POST",
                    url: BASE_URL + '/post-ortu',
                    dataType: 'JSON',
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(msg){
                        var validator = {};
                        if (msg == '0'){
                            var $validator = $("#fOrtu").validate();
                            var errors;

                            /* Build up errors object, name of input and error message: */
                            errors = { ortu: "Parent name sudah terdaftar" };
                            /* Show errors on the form */
                            $validator.showErrors(errors);
                        } else {
                            swal({
                                  title: "Success!",
                                  text: "Your data have ben save!",
                                  icon: "success",
                                  button: "OK!",
                                });
                            $('#ortu').val("");
                            $('#tableOrtu').DataTable().draw();
                        }
                    },
                    error: function(){
                        swal({
                              title: "Error!",
                              text: "Operation failed",
                              icon: "error",
                              button: "OK!",
                            });
                    }
                });
            }
        });
    }

    function updateDataOrtu(){
            
            $("#fOrtu").validate({
            ignore: [],
            debug:true,
            rules : {
                ortu : "required",
            },
            messages : {
                ortu : "Parent name is required !",                    
            },
            errorElement: 'span',
            errorClass: 'help-block text-red',
            submitHandler: function() {
                fdata = new FormData($('form#fOrtu')[0]);
                $.ajax({
                    type: "POST",
                    url: BASE_URL + '/update-ortu',
                    dataType: 'JSON',
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(msg){
                        var validator = {};
                        if (msg == '0'){
                            var $validator = $("#fOrtu").validate();
                            var errors;

                            /* Build up errors object, name of input and error message: */
                            errors = { ortu: "Parent name sudah terdaftar" };
                            /* Show errors on the form */
                            $validator.showErrors(errors);
                        } else {
                            swal({
                                  title: "Success!",
                                  text: "Your data have ben update!",
                                  icon: "success",
                                  button: "OK!",
                                });
                            $('#ortu').val("");
                            $('#tableOrtu').DataTable().draw();
                            $('#myModal').modal('toggle');
                        }
                    },
                    error: function(){
                        swal({
                              title: "Error!",
                              text: "Operation failed",
                              icon: "error",
                              button: "OK!",
                            });
                    }
                });
            }
        });
    }

    function deletOrtu(id) {
        swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                var url = BASE_URL + "/delet-ortu/" + id; 
                                $.ajax({
                                    url      : url,
                                    dataType : "JSON",
                                    method   : "GET",
                                    success  : function(response) {
                                        // alert('yo');
                                        if (response == '1') {
                                            swal({
                                                  title: "Good job!",
                                                  text: "You have delete the data!",
                                                  icon: "success",
                                                  button: "Aww yiss!",
                                                });
                                            $('#tableOrtu').DataTable().draw();
                                        } 
                                    },
                                    error : function(response) {
                                    }
                                });
              } else {
                swal("Your imaginary file is safe!");
              }
            });
    }

    function insertDataCategory(){
            
            $("#fCategory").validate({
            ignore: [],
            debug:true,
            rules : {
                category : "required",
            },
            messages : {
                category : " Parent name is required !",                    
            },
            errorElement: 'span',
            errorClass: 'help-block text-red',
            submitHandler: function() {
                fdata = new FormData($('form#fCategory')[0]);
                $.ajax({
                    type: "POST",
                    url: BASE_URL + '/post-category',
                    dataType: 'JSON',
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(msg){
                        var validator = {};
                        if (msg == '0'){
                            var $validator = $("#fCategory").validate();
                            var errors;

                            /* Build up errors object, name of input and error message: */
                            errors = { category: "Parent name sudah terdaftar" };
                            /* Show errors on the form */
                            $validator.showErrors(errors);
                        } else {
                            swal({
                                  title: "Success!",
                                  text: "Your data have ben save!",
                                  icon: "success",
                                  button: "OK!",
                                });
                            $('#category').val("");
                            $('#tableCategory').DataTable().draw();
                        }
                    },
                    error: function(){
                        swal({
                              title: "Error!",
                              text: "Operation failed",
                              icon: "error",
                              button: "OK!",
                            });
                    }
                });
            }
        });
    }

    function updateDataCategory(){
            
            $("#fCategory").validate({
            ignore: [],
            debug:true,
            rules : {
                category : "required",
            },
            messages : {
                category : "Parent name is required !",                    
            },
            errorElement: 'span',
            errorClass: 'help-block text-red',
            submitHandler: function() {
                fdata = new FormData($('form#fCategory')[0]);
                $.ajax({
                    type: "POST",
                    url: BASE_URL + '/update-category',
                    dataType: 'JSON',
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(msg){
                        var validator = {};
                        if (msg == '0'){
                            var $validator = $("#fCategory").validate();
                            var errors;

                            /* Build up errors object, name of input and error message: */
                            errors = { category: "category name sudah terdaftar" };
                            /* Show errors on the form */
                            $validator.showErrors(errors);
                        } else {
                            swal({
                                  title: "Success!",
                                  text: "Your data have ben update!",
                                  icon: "success",
                                  button: "OK!",
                                });
                            $('#category').val("");
                            $('#tableCategory').DataTable().draw();
                            $('#CategoryModal').modal('toggle');
                        }
                    },
                    error: function(){
                        swal({
                              title: "Error!",
                              text: "Operation failed",
                              icon: "error",
                              button: "OK!",
                            });
                    }
                });
            }
        });
    }

    function deletCategory(id) {
        swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                var url = BASE_URL + "/delet-category/" + id; 
                                $.ajax({
                                    url      : url,
                                    dataType : "JSON",
                                    method   : "GET",
                                    success  : function(response) {
                                        // alert('yo');
                                        if (response == '1') {
                                            swal({
                                                  title: "Good job!",
                                                  text: "You have delete the data!",
                                                  icon: "success",
                                                  button: "Aww yiss!",
                                                });
                                            $('#tableOrtu').DataTable().draw();
                                        } 
                                    },
                                    error : function(response) {
                                    }
                                });
              } else {
                swal("Your imaginary file is safe!");
              }
            });
    }

    function updateDataRole(){
            
            $("#formInput").validate({
            ignore: [],
            debug:true,
            rules : {
                name : "required",
            },
            messages : {
                name : "number asset is required !",                    
            },
            errorElement: 'span',
            errorClass: 'help-block text-red',
            submitHandler: function() {
                fdata = new FormData($('form#formInput')[0]);
                $.ajax({
                    type: "POST",
                    url: BASE_URL + '/set-role',
                    dataType: 'JSON',
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(msg){
                        var validator = {};
                        if (msg == '0'){
                            var $validator = $("#formInput").validate();
                            var errors;

                            /* Build up errors object, name of input and error message: */
                            // errors = { no_asset: "Nomor asset sudah terdaftar" };
                            //  Show errors on the form 
                            // $validator.showErrors(errors);
                        } else {
                            // $('#loc_name').val("");
                            swal({
                                  title: "Success!",
                                  text: "Your data have ben update!",
                                  icon: "success",
                                  button: "OK!",
                                });
                            $('#userTable').DataTable().draw();
                            
                        }
                    },
                    error: function(){
                        swal({
                              title: "Error!",
                              text: "Operation failed",
                              icon: "error",
                              button: "OK!",
                            });
                    }
                });
            }
        });
    }

    function getExcel(){
            
            $("#formExcel").validate({
            ignore: [],
            debug:true,
            rules : {
                location : "required",
                condition : "required"
            },
            messages : {
                location : "Location is required !",
                condition : "Condition is required !",
            },
            errorElement: 'span',
            errorClass: 'help-block text-red',
            submitHandler: function() {
                fdata = new FormData($('form#formExcel')[0]);
                    $.ajax({
                        type: "POST",
                        url: BASE_URL + "/export-inventory",
                        dataType: 'JSON',
                        data: fdata,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(msg){
                            $('#exModal').toggle();
                            // var validator = {};
                            // if (msg == '0'){
                            //     var $validator = $("#formInput").validate();
                            //     var errors;

                            //     /* Build up errors object, name of input and error message: */
                            //     errors = { no_equipment: "Nomor equipment sudah terdaftar" };
                            //     /* Show errors on the form */
                            //     $validator.showErrors(errors);
                            // } else {
                            //     swal({
                            //           title: "Success!",
                            //           text: "Your data have ben save!",
                            //           icon: "success",
                            //           button: "OK!",
                            //         });
                            //     $('#no_asset').val("");
                            //     $('#no_equipment').val("");
                            //     $('#description').val("");
                            //     $('#mic').val("");
                            //     $('#book_val').val("");
                            //     $('#category').val("");
                            //     $('#parent').val("");
                            //     $('#location').val("");
                            //     $('#figure').val("");
                            //     $('#pageTable').DataTable().draw();
                            //     drawChart();
                            // }
                        },
                        error: function(){
                            swal({
                              title: "Error!",
                              text: "Operation failed",
                              icon: "error",
                              button: "OK!",
                            });
                        }
                    });
                }
            });
        }

        function deletUser(id) {
        swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                var url = BASE_URL + "/delet-role/" + id; 
                                $.ajax({
                                    url      : url,
                                    dataType : "JSON",
                                    method   : "GET",
                                    success  : function(response) {
                                        // alert('yo');
                                        if (response == '1') {
                                            swal({
                                                  title: "Good job!",
                                                  text: "You have delete the data!",
                                                  icon: "success",
                                                  button: "Aww yiss!",
                                                });
                                            $('#userTable').DataTable().draw();
                                        } 
                                    },
                                    error : function(response) {
                                    }
                                });
              } else {
                swal("Your imaginary file is safe!");
              }
            });
    }