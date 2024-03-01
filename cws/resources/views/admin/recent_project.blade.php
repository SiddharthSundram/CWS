<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Recent Project</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-header"><h3>Manage Project</h3></div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="callproject">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">Insert Project</div>
                    <div class="card-body">
                        <form action="" id="insertProject">
                            <div class="mb-3">
                                <label for="projectName">Name Of Project</label>
                                <input type="text" id="projectName" class="form-control" name="name" placeholder="Enter name">
                            </div>
                            <div class="mb-3">
                                <label for="projectDescription">Description</label>
                                <textarea id="projectDescription" name="description" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Insert Project</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Function to fetch recent projects
        function fetchProjects() {
            $.ajax({
                type: "GET",
                url: "/api/recent_project",
                dataType: "json",
                success: function(response) {
                    // Clear previous data
                    $("#callproject").empty();
                    // Populate table with fetched projects
                    $.each(response.data, function(index, project) {
                        $("#callproject").append(`<tr>
                            <td>${project.id}</td>
                            <td>${project.name}</td>
                            <td>${project.description}</td>
                            <td>
                                <button type='button' class='btn btn-danger' id='${"btn"+project.id}'>X</button>
                                <button type='button' class='btn btn-info' data-id='${project.id}'>Edit</button>
                            </td>
                        </tr>`);
                        $("#btn" + project.id).click(function() {
                            $.ajax({
                                type: 'delete',
                                url: `api/recent_project/${project.id}`,
                                success: function(response) {
                                    alert(response.msg)
                                    fetchProjects();
                                }
                            });
                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }

        $(document).ready(function() {
            // Call fetchProjects function on page load
            fetchProjects();

            // Handle form submission
            $("#insertProject").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/api/recent_project",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        alert(response.msg);
                        $("#insertProject").trigger("reset");
                        // After inserting project, fetch projects again to update table
                        fetchProjects();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });          
        });
    </script>
</body>
</html>
