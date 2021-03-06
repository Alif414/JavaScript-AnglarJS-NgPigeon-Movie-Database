<!DOCTYPE html>

<!-- data-ng-app="pigeon-table" in the html is essential to inject ngPigeon-table into the webpage-->
<html lang="en" data-ng-app="pigeon-table">
<head>
    <title>Example</title>
    <!-- The includes.php file is required to include all necessary dependencies-->
    <?php
        include "pigeon-table/php/includes.php"
    ?>

</head>

<body>
    <div class="row">
        <div class="col-md-6">
            <h3>Total Movie Casted</h3>
            <!-- No. of movies actors have casted in -->
            <pigeon-table query="SELECT a.fullname 'Fullname', a.gender, a.birthdate 'DOB',
                                 a.birthcountry 'Country', count(c.castid) 'TotalCast'
                                 FROM actor a INNER JOIN casting c ON a.actorno = c.actorno
                                 GROUP BY a.fullname">
            </pigeon-table>
        </div>
        <div class="col-md-6">
            <!-- The rating of the movies -->
            <h3>Movie Rating Table</h3>
            <pigeon-table query="SELECT * FROM rating" control="false" editable="true">
            </pigeon-table>
            <!-- The colour coding of the movies -->
            <h3>Movie Colour Coding</h3>
            <pigeon-table query="SELECT * FROM colourtype" control="true" editable="true">
            </pigeon-table>
        </div>
    </div>
</body>
</html>

