$(document).ready(function() {
    $('#stud_list').DataTable();
});

function edit_student(srno) {
    var base_url=$('#base_url').val();

    Swal.fire({
        title: "Do you want to edit?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#000",
        confirmButtonText: "Edit",
        }).then((result) => {

        setCookie('s_srno',srno,300);
        window.location.href=base_url+"/School/editStudent";
    });

}
function delete_entry(srno) {
    var base_url=$('#base_url').val();

    // alert(base_url+"/School/ajax_delete_entry?srno="+srno);
    Swal.fire({
        title: "Do you want to delete?",
        icon: "error",
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        confirmButtonText: "Delete",
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.ajax({
              url: base_url+"/School/ajax_delete_entry?srno="+srno,
              type: "GET",
              dataType: "JSON",
              success: function(data) {
                  // Handle the received data
                  var myObjectString = JSON.stringify(data);
                  var myarray = jQuery.parseJSON(myObjectString);
                  if(myarray.result>0)
                  {
                      alert("Deleted succesfully");
                      window.location.href=base_url+"/School/index";
                  }
              },
          });
        }
    });

}

function view_student(srno)
{
    var base_url=$('#base_url').val();
    setCookie('v_srno',srno,300);
    window.location.href=base_url+"/School/view";

}

function setCookie(cName, cValue, expDays) {
    let date = new Date();
    date.setTime(date.getTime() + (expDays * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
}
