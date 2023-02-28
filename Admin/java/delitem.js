function Del(name,id,place) {
    if(confirm("Bạn có chắc chắn muốn xóa : " + name + " ?"))
        document.location = './model/delete_model.php?id='+ id +'&place=' + place;
}