$( document ).ready(function() {
    getAllData();
    console.log( "ready!" );
});
$("form#crudAppForm").on("submit",function (e) {
    e.preventDefault();
    var Name = $("#Name").val();
    var Email = $("#Email").val();
    var Phone = $("#Phone").val();
    var Dob = $("#DOB").val();
    var Sex = $("#Sex").val();
    var editId = $("#editId").val();
        $.post("crud-script.php",{
            crudOperation:"saveData",
            Name:Name,
            Email:Email,
            Phone:Phone,
            Dob:Dob,
            Sex:Sex,
            editId:editId,
        },function (response) {
            if (response == "saved") {
                $("#buttonLabel").html("Save");
                $("#spinnerLoader").hide('fast');
                $("#myModal").modal('hide');
                $("form#crudAppForm").each(function () {
                    this.reset();
                });
                getAllData();
            }
        });

});

function getAllData() {
    $.post("crud-script.php",{crudOperation:"getData"},function (allData) {
        $("#crudData").html(allData);
    });
}

function editData(editId,Name,Email,Phone,DOB,Sex) {
    $("#editId").val(editId);
    $("#Name").val(Name);
    $("#Email").val(Email);
    $("#Phone").val(Phone);
    $("#DOB").val(DOB);
    $("#Sex").val(Sex);
    $("#myModal").modal('show');
}

function deleteData(deleteId) {
    if(confirm("Are you sure to delete this ?")){
        $('#deleteSpinner'+deleteId).show('fast');
        $.post("crud-script.php",{crudOperation:"deleteData",deleteId:deleteId},function (response) {
            if (response == "deleted") {
                $('#deleteSpinner'+deleteId).hide('fast');
                getAllData();
            }
        });
    }
}
