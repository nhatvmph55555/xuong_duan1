

$(".block-image").empty();


$("#btnAddImage").click(function (e) {
    e.preventDefault();
    let UI = `
        <div class="mt-4 mb-4">
            <span>Hình ảnh</span>
            <div class="d-flex">
                <input type="file" class="form-control" name="image[]" accept="image/*">
                <button class="btn-sm btn btn-danger btn-delete">Xóa</button>
            </div>
            

        </div>
        <br>
    `;
    $(".block-image").append(UI)

})

$(".block-image").on('click', '.btn-delete', function(){
    $(this).parent().parent().remove()
})