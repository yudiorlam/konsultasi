@extends('admin.layout.appAdmin')
@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card gutter-b">
            <div class="card-header py-4">
                <h3>Grafik Per-Bulan</h3>
            </div>
            <div class="card-body p-0">
                <div id="chartdiv"></div>
            </div>
        </div>
        <div class="card gutter-b">
            <div class="card-header py-4">
                <h3>TES</h3>
            </div>
            <div class="card-body p-0">
                <div id="chartDonut"></div>
            </div>
        </div>
        <div class="card gutter-b">
            <div class="card-header py-4">
                <h3>TES</h3>
            </div>
            <div class="card-body p-0">
                <div id="chartLine"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section ('js')
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>

<!-- Chart code -->
<script>
  am5.ready(function() {
  var root = am5.Root.new("chartdiv");
  root.setThemes([
    am5themes_Animated.new(root)
  ]);

  $.ajax({
    url: "{{ url('/grafik-batangan') }}",
    type: 'get',
    dataType: 'json',
    success: function(response) {
      data = response;

  var chart = root.container.children.push(
    am5xy.XYChart.new(root, {
      panX: false,
      panY: false,
      wheelX: "none",
      wheelY: "none",
      paddingBottom: 50,
      paddingTop: 40
    })
  );

  var xRenderer = am5xy.AxisRendererX.new(root, {});
  xRenderer.grid.template.set("visible", false);

  var xAxis = chart.xAxes.push(
    am5xy.CategoryAxis.new(root, {
      paddingTop:40,
      categoryField: "name",
      renderer: xRenderer
    })
  );


  var yRenderer = am5xy.AxisRendererY.new(root, {});
  yRenderer.grid.template.set("strokeDasharray", [3]);

  var yAxis = chart.yAxes.push(
    am5xy.ValueAxis.new(root, {
      min: 0,
      renderer: yRenderer
    })
  );

  var series = chart.series.push(
    am5xy.ColumnSeries.new(root, {
      name: "Income",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "steps",
      categoryXField: "name",
      sequencedInterpolation: true,
      calculateAggregates: true,
      maskBullets: false,
      tooltip: am5.Tooltip.new(root, {
        dy: -30,
        pointerOrientation: "vertical",
        labelText: "{valueY}"
      })
    })
  );

  series.columns.template.setAll({
    strokeOpacity: 0,
    cornerRadiusBR: 10,
    cornerRadiusTR: 10,
    cornerRadiusBL: 10,
    cornerRadiusTL: 10,
    maxWidth: 50,
    fillOpacity: 0.8
  });

  var currentlyHovered;

  series.columns.template.events.on("pointerover", function (e) {
    handleHover(e.target.dataItem);
  });

  series.columns.template.events.on("pointerout", function (e) {
    handleOut();
  });

  function handleHover(dataItem) {
    if (dataItem && currentlyHovered != dataItem) {
      handleOut();
      currentlyHovered = dataItem;
      var bullet = dataItem.bullets[0];
      bullet.animate({
        key: "locationY",
        to: 1,
        duration: 600,
        easing: am5.ease.out(am5.ease.cubic)
      });
    }
  }

  function handleOut() {
    if (currentlyHovered) {
      var bullet = currentlyHovered.bullets[0];
      bullet.animate({
        key: "locationY",
        to: 0,
        duration: 600,
        easing: am5.ease.out(am5.ease.cubic)
      });
    }
  }

  var circleTemplate = am5.Template.new({});

  series.bullets.push(function (root, series, dataItem) {
    var bulletContainer = am5.Container.new(root, {});
    var circle = bulletContainer.children.push(
      am5.Circle.new(
        root,
        {
          radius: 34
        },
        circleTemplate
      )
    );

    var maskCircle = bulletContainer.children.push(
      am5.Circle.new(root, { radius: 27 })
    );

    // only containers can be masked, so we add image to another container
    var imageContainer = bulletContainer.children.push(
      am5.Container.new(root, {
        mask: maskCircle
      })
    );

    var image = imageContainer.children.push(
      am5.Picture.new(root, {
        templateField: "pictureSettings",
        centerX: am5.p50,
        centerY: am5.p50,
        width: 60,
        height: 60
      })
    );

    return am5.Bullet.new(root, {
      locationY: 0,
      sprite: bulletContainer
    });
  });

  // heatrule
  series.set("heatRules", [
    {
      dataField: "valueY",
      min: am5.color(0xe5dc36),
      max: am5.color(0x5faa46),
      target: series.columns.template,
      key: "fill"
    },
    {
      dataField: "valueY",
      min: am5.color(0xe5dc36),
      max: am5.color(0x5faa46),
      target: circleTemplate,
      key: "fill"
    }
  ]);

  series.data.setAll(data);
  xAxis.data.setAll(data);

  var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
  cursor.lineX.set("visible", false);
  cursor.lineY.set("visible", false);

  cursor.events.on("cursormoved", function () {
    var dataItem = series.get("tooltip").dataItem;
    if (dataItem) {
      handleHover(dataItem);
    } else {
      handleOut();
    }
  });

  series.appear();
  chart.appear(1000, 100);



   }
  });



  });
</script>



<script>
am5.ready(function() {
    var root = am5.Root.new("chartDonut");
    root.setThemes([
        am5themes_Animated.new(root)
    ]);
    var chart = root.container.children.push(
        am5percent.PieChart.new(root, {
            endAngle: 270
    })
    );
    var series = chart.series.push(
        am5percent.PieSeries.new(root, {
            valueField: "value",
            categoryField: "category",
            endAngle: 270
        })
    );

    series.states.create("hidden", {
    endAngle: -90
    });

    $.ajax({
      url: "{{ url('/grafik-donat') }}",
      type: 'get',
      dataType: 'json',
      success: function(response) {
        series.data.setAll(
          response
        )
      }

    });

    series.appear(1000, 100);
});
</script>

<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartLine");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: true,
  panY: true,
  wheelX: "panX",
  wheelY: "zoomX",
  pinchZoomX:true
}));

chart.get("colors").set("step", 3);


// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
  maxDeviation: 0.3,
  baseInterval: {
    timeUnit: "day",
    count: 1
  },
  renderer: am5xy.AxisRendererX.new(root, {}),
  tooltip: am5.Tooltip.new(root, {})
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation: 0.3,
  renderer: am5xy.AxisRendererY.new(root, {})
}));


// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.LineSeries.new(root, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value1",
  valueXField: "date",
  tooltip: am5.Tooltip.new(root, {
    labelText: "{valueX}: {valueY}\n{previousDate}: {value2}"
  })
}));

series.strokes.template.setAll({
  strokeWidth: 2
});

series.get("tooltip").get("background").set("fillOpacity", 0.5);

var series2 = chart.series.push(am5xy.LineSeries.new(root, {
  name: "Series 2",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value2",
  valueXField: "date"
}));
series2.strokes.template.setAll({
  strokeDasharray: [2, 2],
  strokeWidth: 2
});

// Set date fields
// https://www.amcharts.com/docs/v5/concepts/data/#Parsing_dates
root.dateFormatter.setAll({
  dateFormat: "yyyy-MM-dd",
  dateFields: ["valueX"]
});


// Set data
var data = [{
  date: new Date(2019, 5, 12).getTime(),
  value1: 50,
  value2: 48,
  previousDate: new Date(2019, 5, 5)
}, {
  date: new Date(2019, 5, 13).getTime(),
  value1: 53,
  value2: 51,
  previousDate: "2019-05-06"
}, {
  date: new Date(2019, 5, 14).getTime(),
  value1: 56,
  value2: 58,
  previousDate: "2019-05-07"
}, {
  date: new Date(2019, 5, 15).getTime(),
  value1: 52,
  value2: 53,
  previousDate: "2019-05-08"
}, {
  date: new Date(2019, 5, 16).getTime(),
  value1: 48,
  value2: 44,
  previousDate: "2019-05-09"
}, {
  date: new Date(2019, 5, 17).getTime(),
  value1: 47,
  value2: 42,
  previousDate: "2019-05-10"
}, {
  date: new Date(2019, 5, 18).getTime(),
  value1: 59,
  value2: 55,
  previousDate: "2019-05-11"
}]

series.data.setAll(data);
series2.data.setAll(data);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
series2.appear(1000);
chart.appear(1000, 100);

}); // end am5.ready()
</script>
@endsection