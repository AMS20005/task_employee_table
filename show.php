<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <title>Employee Table</title>
        
    </head>
    <body >
       <div class="header" style="padding: 20px;">
         <table border="1" id="employeeTable">
            <caption>Employee Table</caption>
            <thead>
                <tr>
                    <th>emp id</th>
                    <th>fullname</th>
                    <th>email</th>
                    <th>date of birth</th>
                    <th>date of joining</th>
                    <th>salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody> 
            </tbody>
        </table>
        
        <button id="addemployee" onclick="openAddModal()">Add Employee</button>
       </div>
       
       <div id="empModal" class="modal-overlay">
            <div class="modal-card">
                <h3 id="modalTitle">Add Employee</h3>
                <form id="empForm" method="POST" action="action.php">
                    <input type="hidden" name="emp_id" id="emp_id">
                    
                    <label>Full Name</label>
                    <input type="text" name="fullname" id="fullname" required>
                    
                    <label>Email</label>
                    <input type="email" name="email" id="email" required>
                    
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" required>
                    
                    <label>Date of Joining</label>
                    <input type="date" name="date_of_joining" id="date_of_joining" required>
                    
                    <label>Salary</label>
                    <input type="number" step="0.01" name="salary" id="salary" required>
                    
                    <div class="modal-buttons">
                        <button type="submit" name="save_action" id="saveBtn" class="btn-save">Save</button>
                        <button type="button" class="btn-cancel" onclick="closeModal('empModal')">Cancel</button>
                    </div>
                </form>
            </div>
       </div>

       
       <div id="deleteModal" class="modal-overlay">
            <div class="modal-card" style="text-align: center;">
                <h3 style="margin-bottom: 15px; color: #e74c3c;">Confirm Delete</h3>
                <p style="margin-bottom: 20px; color: #555;">Are you sure you want to delete this employee?</p>
                <div class="modal-buttons">
                    <a id="confirmDeleteBtn" href="#" class="btn-cancel">Delete</a>
                    <button type="button" style="background: #95a5a6;" class="btn-cancel" onclick="closeModal('deleteModal')">Cancel</button>
                </div>
            </div>
       </div>

        <script>
            $(document).ready(function() {
                $('#employeeTable').DataTable({
                    "serverSide": true,
                    "stateSave": true,
                    "ajax": {
                        "url": "fetch_data.php",
                        "type": "POST"
                    },
                    "pageLength": 10, 
                    "info": false,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var pageInfo = api.page.info();
                        if (pageInfo.pages <= 1) {
                            $('.dataTables_paginate').hide();
                        } else {
                            $('.dataTables_paginate').show();
                        }
                    }
                });
            });

            // فتح مودل الإضافة
            function openAddModal() {
                $('#modalTitle').text('Add Employee');
                $('#empForm')[0].reset();
                $('#emp_id').val('');
                $('#saveBtn').attr('name', 'add'); 
                $('#empModal').css('display', 'flex');
            }

            function openEditModal(id, fullname, email, dob, doj, salary) {
                $('#modalTitle').text('Update Employee');
                $('#emp_id').val(id);
                $('#fullname').val(fullname);
                $('#email').val(email);
                $('#date_of_birth').val(dob);
                $('#date_of_joining').val(doj);
                $('#salary').val(salary);
                
                $('#empForm').attr('action', 'action.php?id=' + id);
                $('#saveBtn').attr('name', 'update'); 
                
                $('#empModal').css('display', 'flex');
            }

            function openDeleteModal(id) {
                $('#confirmDeleteBtn').attr('href', 'action.php?id=' + id);
                $('#deleteModal').css('display', 'flex');
            }

            
            function closeModal(modalId) {
                $('#' + modalId).hide();
            }
        </script>
    </body>
</html>