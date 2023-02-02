<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="align-items-center mb-4">
                <h1 class="h3 my-5 text-gray-800"><i class="fas fa-plus-circle me-2"></i>Add Course</h1>

                <form action="">
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="title" name="title" placeholder="title">
                        <label for="title">Course Title</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="outline" name="outline" placeholder="outline">
                        <label for="outline">Course Outlines</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="duration" name="duration" placeholder="duration">
                        <label for="duration">Duration</label>
                    </div>
                    <div class="form-floating my-3">
                        <select class="form-select" id="classType" name="classType">
                            <option selected>Select Class Type</option>
                            <option value="Zoom Class">Zoom Class</option>
                            <option value="Video Class">Video Class</option>
                        </select>
                        <label for="course">Select Your Class Type</label>
                    </div>
                    
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-plus-circle me-2"></i>Add Course</button>
                        <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>