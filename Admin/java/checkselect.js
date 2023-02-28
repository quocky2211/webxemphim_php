function check() {
    var flag = 0;
    var arr = document.getElementsByClassName("select-check");
    for (var i = 0 ; i < arr.length; i++)
    {
        if(arr[i].checked == true)
        {
            flag = 1;
            break;
        }
    }
    if (flag == 1) enableall();
    else disableall();
}
function enableall() {
    document.getElementById("btn-nhap-hang").disabled = false;
    document.getElementById("btn-xuat-hang").disabled = false;
}
function disableall() {
    document.getElementById("btn-nhap-hang").disabled = true;
    document.getElementById("btn-xuat-hang").disabled = true;
}