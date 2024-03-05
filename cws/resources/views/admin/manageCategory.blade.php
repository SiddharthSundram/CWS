@extends('admin.base')

@section('content')
    <div class="container mt-16">
        <div class="flex justify-between mb-3 mt-3 items-center">
            <h2 class="text-2xl font-bold">Manage Category (<span id="counting">0</span>)</h2>
            <a href="{{ route('insertCategory') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-plus mr-1"></i> Add New Category
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4 border">ID</th>
                        <th class="py-2 px-4 border">Category Title</th>
                        <th class="py-2 px-4 border">Category Description</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody id="categoryCalling">
                    <!-- Dynamic data will be inserted here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div id="editCategoryModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-hidden="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="editCategoryModalLabel">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h5 class="text-lg font-semibold mb-4" id="editCategoryModalLabel">Edit Category</h5>
                    <form id="editCategoryForm">
                        <input type="hidden" id="editCategoryId" name="id">
                        <div class="mb-4">
                            <label for="editCategoryTitle" class="block text-sm font-medium text-gray-700">Category
                                Title</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editCategoryTitle" name="title" required>
                        </div>
                        <div class="mb-4">
                            <label for="editCategoryDescription"
                                class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editCategoryDescription" name="description" rows="3" required></textarea>
                        </div>
                        <div class="flex justify-between">
                            <button type="submit"
                                class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save
                                changes</button>
                            <button type="button" id="cancelEditCategory"
                                class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Function to fetch and display categories
            let callingCategory = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('category.index') }}",
                    success: function(response) {
                        let table = $("#categoryCalling");
                        table.empty();

                        let data = response.data;

                        // Update category count
                        let len = data.length;
                        $("#counting").html(len);

                        data.forEach((item) => {
                            table.append(`
                            <tr class=" hover:bg-gray-100">
                                <td class="py-2 px-4 border">${item.id}</td>
                                <td class="py-2 px-4 border">${item.cat_title}</td>
                                <td class="py-2 px-4 border">${item.cat_description}</td>
                                <td class="py-2 px-4 border">
                                    <button class="edit-btn bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded-sm" data-id="${item.id}"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded-sm" id="${"btn"+item.id}"><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                        `);

                            // Event listener for delete button
                            $("#btn" + item.id).click(function() {
                                $.ajax({
                                    type: "DELETE",
                                    url: `/api/category/${item.id}`,
                                    success: function(response) {
                                        alert(response.msg);
                                        // Refresh category list
                                        callingCategory();
                                    }
                                });
                            });

                            // Event listener for edit button
                            $(".edit-btn").click(function() {
                                let categoryId = $(this).attr("data-id");
                                // Populate the edit modal with category details
                                populateEditModal(categoryId);
                            });
                        });
                    }
                });
            }

            // Function to populate edit modal with category details
            function populateEditModal(categoryId) {
                $.ajax({
                    type: "GET",
                    url: `/api/category/${categoryId}`,
                    success: function(response) {
                        let category = response.data;
                        $("#editCategoryId").val(category.id);
                        $("#editCategoryTitle").val(category.cat_title);
                        $("#editCategoryDescription").val(category.cat_description);
                        // Show the edit modal
                        $("#editCategoryModal").removeClass("hidden");
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching category details:', error);
                    }
                });
            }

            // Handle form submission for editing category
            $('#editCategoryForm').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                var categoryId = $('#editCategoryId').val();
                $.ajax({
                    type: 'PUT',
                    url: `/api/category/${categoryId}`,
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        alert(response.msg);
                        $('#editCategoryModal').addClass('hidden'); // Hide the edit modal
                        callingCategory(); // Refresh the category list
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating category:', error);
                    }
                });
            });

            callingCategory();
        });
    </script>
@endsection
