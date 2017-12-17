function ChangeToSlug()
{
    var ten, slug;
    ten = $('#ten').val();
    slug = ten.toLowerCase();
  
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    $('#slug').val(slug);
};


$('#ten').keyup(function(){
    ChangeToSlug();
});


$('#dataTables-example input[type=checkbox]:eq(0)').change(function(){
    $('#dataTables-example input[type=checkbox]').prop("checked",$(this).prop("checked"));
});

function getXoa($url, $id , $type){
    $.get($url,{id:$id,type:$type},function(data){
        alert(data);
        location.reload();
    });
};

function preUpImg(){
    anh = $('#anh').val();
    if(anh !== ''){
        $('#anhxemtruoc').removeClass('hidden');
        $('#anhxemtruoc').html('<th>Ảnh xem trước</strong></th>');
        count = $('#anh').get(0).files.length;
        for(i=0;i< count;i++){
            $('#anhxemtruoc').append('<img src="' + URL.createObjectURL(event.target.files[i]) +'" style="border: 1px solid #ddd; width: 50px; height: 50px; margin-right: 5px; margin-bottom: 5px;" />');
        }
    }else{
        $('#anhxemtruoc').addClass('hidden');
        $('#anhxemtruoc').html('');
    }
};



$('.link-cart').click(function(){
    $id = $(this).attr('data-id');
    $sl = $('.soluong').val();
    if(!$sl){
        $sl = 1;
    }
    $.get('/cart/'+$id,{id:$id,sl:$sl},function(data){
        $('#cartsoluong').html(data);
        alert('Đã thêm vào giỏ hàng');
    });
});

$('.trashbtn').click(function(){
    $id = $(this).attr('data-id');
    $.get('/remove/'+$id,{id:$id},function(data){
        location.reload();
    });
});


function getSale($url, $type, $value, $id = []){
    $.get($url,{type:$type,value:$value,id:$id},function(data){
        alert(data);
        location.reload();
    });
};
