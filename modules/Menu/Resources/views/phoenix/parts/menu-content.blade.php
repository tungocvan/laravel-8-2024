@php
    // $posts = $data['allPost']
@endphp
<h4 class="my-2">Quản lý  MENU</h4>
<hr />

@if (session('msg'))
    <div class="alert alert-outline-success mt-2">{{session('msg')}}</div>
@endif 

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    .edit-form {
            margin-bottom: 20px;
        }
</style>

<div class="pb-6">
    <div id="jsonData"></div>
    <!-- Modal -->    
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">                                    
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnEditModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group">
                            <label for="edit-id">ID</label>
                            <input type="text" class="form-control" id="edit-id" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="edit-title">Title</label>
                            <input type="text" class="form-control" id="edit-title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="edit-parent_id">Parent ID</label>
                            <input type="text" class="form-control" id="edit-parent_id" name="parent_id">
                        </div>
                        <div class="form-group">
                            <label for="edit-href">Href</label>
                            <input type="text" class="form-control" id="edit-href" name="href">
                        </div>
                        <div class="form-group">
                            <label for="edit-iconClass">Icon Class</label>
                            <input type="text" class="form-control" id="edit-iconClass" name="iconClass">
                        </div>
                        <button type="submit" class="btn btn-primary my-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  

<script>
    $(document).ready(function() {
        const data = @json($data).data;
        displayJsonData(data);
        console.log('data:',data);
        function displayJsonData(data) {
            const jsonDataDiv = $('#jsonData');
            jsonDataDiv.html('');

            for (const [key, value] of Object.entries(data)) {
                if (Array.isArray(value)) {
                    const table = $('<table></table>');
                    const headerRow = $('<tr></tr>');
                    const headers = ['ID', 'Title', 'Parent ID', 'Href', 'Icon Class', 'Actions'];

                    headers.forEach(header => {
                        const th = $('<th></th>').text(header);
                        headerRow.append(th);
                    });

                    table.append(headerRow);

                    value.forEach((item, index) => {
                        const row = $('<tr></tr>');
                        Object.values(item).forEach(val => {
                            const td = $('<td></td>').text(val);
                            row.append(td);
                        });

                        const actionTd = $('<td></td>');
                        
                        const editButton = $('<button class="btn btn-primary">Edit</button>').on('click', () => showEditModal(key, index, item));
                        let deleteButton = $('<button class="btn btn-primary mx-5">Delete</button>').on('click', () => deleteEntry(key, index));
                        if(index === 0){
                             deleteButton = '';
                        }
                        

                        actionTd.append(editButton).append(deleteButton);
                        row.append(actionTd);

                        table.append(row);
                    });

                    jsonDataDiv.append($('<h2></h2>').text(key)).append(table);
                } else {
                    console.error(`Value of key ${key} is not an array`, value);
                }
            }
        }
        
        function editEntry(menuName, index, item) {
            const newTitle = prompt('Nhập tiêu đề mới:', item.title);
            if (newTitle !== null) {
                item.title = newTitle;
                updateJsonData(menuName, index, item);
            }
        }

        function showEditModal(menuName, index, item) {
                $('#edit-id').val(item.id);
                $('#edit-title').val(item.title);
                $('#edit-parent_id').val(item.parent_id);
                $('#edit-href').val(item.href);
                $('#edit-iconClass').val(item.iconClass);
                $('#editForm').off('submit').on('submit', function(event) {
                    event.preventDefault();
                    const newItem = {
                        id: $('#edit-id').val(),
                        title: $('#edit-title').val(),
                        parent_id: $('#edit-parent_id').val(),
                        href: $('#edit-href').val(),
                        iconClass: $('#edit-iconClass').val()
                    };
                    updateJsonData(menuName, index, newItem);
                });
                $('#editModal').modal('show');
                $('#btnEditModal').click(function(){
                        //đoạn mã sẽ được thực thi khi sự kiện click() xảy ra                        
                        $('#editModal').modal('hide');
                })
            }

       

       
            function deleteEntry(menuName, index) {
            if (confirm('Bạn có chắc chắn muốn xóa mục này?')) {
                data[menuName].splice(index, 1);             
                // Nếu mảng sau khi xóa chỉ còn một phần tử, xóa luôn key menuName
                if (data[menuName].length === 1) {
                        delete data[menuName];
                }
                saveJsonData(data);
            }
        }

        function updateJsonData(menuName, index, newItem) {
            data[menuName][index] = newItem;
            saveJsonData(data);
        }

        function saveJsonData(data) {
            $.ajax({
                url: '/menu/delete',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ jsonData: JSON.stringify(data) }),
                success: function(response){                    
                    displayJsonData(data);
                    $('#editModal').modal('hide');
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.error);
                }
            });
        }
    });
</script>