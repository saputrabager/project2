
var BASE_URL = window.location.hostname + ":8000/";

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
    $('#parent').val(data['PARENT']);
    $('#location').val(data['LOCATION']).trigger('change');
    $('#myModal').modal('toggle');
    $('#updateInvent').show();
    $('#storeInvent').hide();
    console.log( data );
} );

$('#tableLoc tbody').on( 'click', '#edit', function () {
    var data = $('#tableLoc').DataTable().row( $(this).parents('tr') ).data();
    $('#loc_name').val(data['LOC_NAME']);
    $('#id').val(data['ID']);
    $('#locModal').modal('toggle');
    $('#updateLoc').show();
    $('#storeLoc').hide();
    console.log( data );
} );

$('#userTable tbody').on( 'click', '#edit', function () {
    var data = $('#userTable').DataTable().row( $(this).parents('tr') ).data();
    $('#name').val(data['name']);
    $('#role-level').val(data['role']).trigger('change');
    $('#myModal').modal('toggle');
    console.log( data );
} );