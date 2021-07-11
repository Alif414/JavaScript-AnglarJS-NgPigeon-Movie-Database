<!DOCTYPE html>

<!-- data-ng-app="pigeon-chart" in the html is essential to inject ngPigeon-chart into the webpage-->
<html lang="en" data-ng-app="pigeon-chart" data-ng-cloak>
<head>
    <title>Demo: pigeon-chart</title>
    <!-- The includes.php file is required to include all necessary dependencies-->
    <?php
        include "pigeon-chart/php/includes.php"
    ?>

    <link rel="stylesheet" href="pigeon-chart/css/bootstrap.min.css"/>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Line chart of moveis released per year -->
                <pigeon-chart query="SELECT relyear, count(relyear) FROM movie GROUP BY relyear"
                              type="line" data-data-label="true" title="No. of releases per year"
                              axisx-title="Year", axisy-title="No. of Movies">
                </pigeon-chart>
            </div>
            <div class="col-md-6">
                <!-- Multi-series line chart of the average, max and minimum runtime of movies per year -->
                <pigeon-chart query="SELECT relyear, min(runtime) 'Min. Duration' ,
                                     avg(runtime) 'Avg. Duration' , max(runtime) 'Max. Duration'
                                     FROM movie GROUP BY relyear" type="line"
                                     title="Runtime of Movies 1953-2016" subtitle="Min, Average & Max"
                                     axisx-title="Year" axisy-title="Runtime" >
                </pigeon-chart>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Pie chart that shows the rating code of the movies -->
                <pigeon-chart query="SELECT ratingcode, count(ratingcode) FROM movie GROUP BY ratingcode"
                              title="Total Number of Movie by Rating" type="pie" axisy-title="Movie Count"
                              show-legend="true" data-data-label="true" subtitle="Maturity Rating">
                </pigeon-chart>
            </div>
            <div class="col-md-6">
                <!-- Spline chart showing good and bad movies -->
                <pigeon-chart query="SELECT ratingcode, SUM(IF(tmdb_score >= 7, 1 , 0)) as 'Good Movie',
                                     SUM(IF(tmdb_score < 7, 1 , 0)) as 'Bad Movie' FROM movie
                                     GROUP BY ratingcode" type="spline" title="Number of Movies based by Ratings"
                                     subtitle="Good movies are above 7, bad are below" axisx-title="Rating"
                                     axisy-title="No. of movies" show-legend="true">
                </pigeon-chart>
            </div>
        </div>


    </div>
</body>
</html>
