<html>
<head>
 <title>Menghubungkan codeigniter dengan database mysql</title>
</head>
<body>

<h1>Mengenal Model Pada Codeigniter</h1>
<button id="btnAdd">add data</button>

<div id="modalAdd" style="width: 300px; min-height: 200px; border: 1px solid rgb(0,0,0,0.125); position: absolute; background: white; display: none">
    <form action="products/tambah" style="padding: 20px" method="post">
    Create
        <div>
            <p style="margin: 8px 0">nama</p>
            <input type="text" name="name">
        </div>
        <div>
            <p style="margin: 8px 0">price</p>
            <input type="text" name="price">
        </div>
        <div>
            <p style="margin: 8px 0">image</p>
            <input type="text" name="image">
        </div>
        <div>
            <p style="margin: 8px 0">description</p>
            <input type="text" name="description">
        </div>
        <button id="submitAdd" style="margin-top: 8px">submit</button>
    </form>
</div>

<div id="modalEdit" style="width: 300px; min-height: 200px; border: 1px solid rgb(0,0,0,0.125); position: absolute; background: white; display: none">
    <form action="products/ubah" style="padding: 20px" method="post">
        Edit
        <div>
            <p style="margin: 8px 0">nama</p>
            <input type="hidden" name="id" id="id">
            <input type="text" name="name" id="name">
        </div>
        <div>
            <p style="margin: 8px 0">price</p>
            <input type="text" name="price" id="price">
        </div>
        <div>
            <p style="margin: 8px 0">image</p>
            <input type="text" name="image" id="image">
        </div>
        <div>
            <p style="margin: 8px 0">description</p>
            <input type="text" name="description" id="description">
        </div>
        <button id="submitEdit" style="margin-top: 8px">submit</button>
    </form>
</div>

<div id="modalHapus" style="width: 300px; min-height: 50px; border: 1px solid rgb(0,0,0,0.125); position: absolute; background: white; display: none">
    <div style="padding: 20px">
        Delete this data item?<br>
        <button id="btnHapus" href="">Yes, Delete</button>
    </div>
</div>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Price</th>
        <th>Image</th>
        <th>description</th>
        <th>Action</th>
    </tr>
<?php 
    foreach($products as $u){ 
?>
    <tr>
        <td><?php echo $u->product_id ?></td>
        <td><?php echo $u->name ?></td>
        <td><?php echo $u->price ?></td>
        <td><?php echo $u->image ?></td>
        <td><?php echo $u->description ?></td>
        <td>
            <button id="<?php echo $u->product_id ?>"
                    data-id="<?php echo $u->product_id ?>"
                    data-name="<?php echo $u->name ?>"
                    data-price="<?php echo $u->price ?>"
                    data-image="<?php echo $u->image ?>"
                    data-desc="<?php echo $u->description ?>"
                    onclick="edit(this.id, this)">edit</button>

            <button data-id="<?php echo $u->product_id ?>" onclick="del(this)">delete</button>
        </td>
    </tr>
<?php } ?>
</table>
<script>
    var btnAdd = document.getElementById('btnAdd');
    var btnHapus = document.getElementById('btnHapus');

    var modalAdd = document.getElementById('modalAdd');
    var modalEdit = document.getElementById('modalEdit');
    var modalHapus = document.getElementById('modalHapus');

    btnAdd.onclick = function(){
        modalAdd.style.display = 'block';
    }

    function edit(id, data){
        modalEdit.style.display = 'block';

        document.getElementById('id').setAttribute("value",data.getAttribute('data-id'));
        document.getElementById('name').setAttribute("value",data.getAttribute('data-name'));
        document.getElementById('price').setAttribute("value",data.getAttribute('data-price'));
        document.getElementById('image').setAttribute("value",data.getAttribute('data-image'));
        document.getElementById('description').setAttribute("value",data.getAttribute('data-desc'));
    }

    function del(data){
        modalHapus.style.display = 'block';

        btnHapus.onclick = function(){
            window.location="products/delData/"+data.getAttribute('data-id');
        }
    }
</script>
</body>
</html>