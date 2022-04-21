<html>
<head>
</head>
<body>

    <form id="mainForm" action="getArray.php" method="post">
        <input type="date" value = "2006-01-01" name="startDate">
        <input type="date" value = "2006-01-21" name="endDate">
        <input type="submit">
    </form>

    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>

</body>
</html>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script src="jquery-3.3.1.min.js"></script>
<script src="script.js"></script>