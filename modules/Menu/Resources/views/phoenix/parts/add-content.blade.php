@php
    // $posts = $data['allPost']
@endphp
<h4 class="my-2">THÊM MỚI MENU</h4>
<hr />

@if (session('msg'))
    <div class="alert alert-outline-success mt-2">{{session('msg')}}</div>
@endif 

<div class="pb-6">
    <form action="{{ route('menu.menu-add')}}" method="post">
        @csrf
        <label for="menu_name">Tên Menu:</label>
        <input type="text" id="menu_name" name="menu_name" required><br><br>
        
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br><br>
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="parent_id">Parent ID:</label>
        <input type="number" id="parent_id" name="parent_id" required><br><br>
        
        <label for="href">Href:</label>
        <input type="text" id="href" name="href" required><br><br>
        
        <label for="iconClass">Icon Class:</label>
        <input type="text" id="iconClass" name="iconClass" required><br><br>
        
        <input type="submit" value="Thêm vào JSON">
    </form>
</div>  