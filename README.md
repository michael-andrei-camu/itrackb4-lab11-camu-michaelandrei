# Laboratory Activity 9 - Project Readme

### F1: Nullable Column Choice
I made the `director` column nullable because not all media entries initially have a confirmed director assigned (such as unannounced indie projects or collaborative works). Other attributes like `title`, `release_year`, and `is_featured` are core details that every record must strictly have.

### F2: First Error Encountered
The first error I encountered was during Part B when attempting to create a record via Tinker before defining the `$fillable` property inside the Model. Laravel threw an `Illuminate\Database\Eloquent\MassAssignmentException` to protect against unauthorized mass-assignment.

### F3: Why Blade Files Didn't Need Editing
The Blade view files did not require any modification because the controller passes data variables using identical names (`$movies` and `$movie`) and Eloquent models expose attributes through standard object properties that match what the views were already reading.