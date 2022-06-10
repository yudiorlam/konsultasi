@extends('admin.layout.appAdmin')
@section('content')



  <div class="container">
    
    <div class="row mb-5">
      <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card bg-c-red">
          <div class="card-body">
            <div class="row align-items-center m-b-25">
              <div class="col">
                <h6 class="m-b-5 text-white">Keuangan</h6>
                <h3 class="m-b-0 text-white">{{ $keuangan }} Responden</h3>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign text-c-red f-18"></i>
              </div>
            </div>
            {{-- <p class="m-b-0 text-white"><span class="label label-danger m-r-10">+11%</span>From Previous Month</p> --}}
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card bg-c-blue">
          <div class="card-body">
            <div class="row align-items-center m-b-25">
              <div class="col">
                <h6 class="m-b-5 text-white">Kegiatan Fisik</h6>
                <h3 class="m-b-0 text-white">{{ $kegiatanFisik }} Responden</h3>
              </div>
              <div class="col-auto">
                <i class="fas fa-database text-c-blue f-18"></i>
              </div>
            </div>
            {{-- <p class="m-b-0 text-white"><span class="label label-primary m-r-10">+12%</span>From Previous Month</p> --}}
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card bg-c-green">
          <div class="card-body">
            <div class="row align-items-center m-b-25">
              <div class="col">
                <h6 class="m-b-5 text-white">Kepegawaian</h6>
                <h3 class="m-b-0 text-white">{{ $kepegawaian }} Responden</h3>
              </div>
              <div class="col-auto">
                <i class="fas fa-user-tie text-c-green f-18"></i>
              </div>
            </div>
            {{-- <p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From Previous Month</p> --}}
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card bg-c-yellow">
          <div class="card-body">
            <div class="row align-items-center m-b-25">
              <div class="col">
                <h6 class="m-b-5 text-white">DLL</h6>
                <h3 class="m-b-0 text-white">{{ $dll }} Responden</h3>
              </div>
              <div class="col-auto">
                <i class="fas fa-database text-c-yellow f-18"></i>
              </div>
            </div>
            {{-- <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p> --}}
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card bg-c-yellow">
          <div class="card-body">
            <div class="row align-items-center m-b-25">
              <div class="col">
                <h6 class="m-b-5 text-white">Total Responden</h6>
                <h3 class="m-b-0 text-white">{{ $total }} Responden</h3>
              </div>
              <div class="col-auto">
                <i class="fas fa-users text-c-yellow f-18"></i>
              </div>
            </div>
            {{-- <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p> --}}
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card bg-c-green">
          <div class="card-body">
            <div class="row align-items-center m-b-25">
              <div class="col">
                <h6 class="m-b-5 text-white" style="font-size: 11pt">Konsultasi Berlangsung</h6>
                <h3 class="m-b-0 text-white">{{ $status1 }} Responden</h3>
              </div>
              <div class="col-auto">
                <i class="fas fa-users text-c-green f-18"></i>
              </div>
            </div>
            {{-- <p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From Previous Month</p> --}}
          </div>
        </div>
      </div>

       <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card bg-c-blue">
          <div class="card-body">
            <div class="row align-items-center m-b-25">
              <div class="col">
                <h6 class="m-b-5 text-white">Konsultasi Selesai</h6>
                <h3 class="m-b-0 text-white">{{ $status2 }} Responden</h3>
              </div>
              <div class="col-auto">
                <i class="fas fa-users text-c-blue f-18"></i>
              </div>
            </div>
            {{-- <p class="m-b-0 text-white"><span class="label label-primary m-r-10">+12%</span>From Previous Month</p> --}}
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card bg-c-red">
          <div class="card-body">
            <div class="row align-items-center m-b-25">
              <div class="col">
                <h6 class="m-b-5 text-white">Narasumber Aktif</h6>
                <h3 class="m-b-0 text-white">{{ $users }} Narasumber</h3>
              </div>
              <div class="col-auto">
                <i class="fas fa-users text-c-red f-18"></i>
              </div>
            </div>
            {{-- <p class="m-b-0 text-white"><span class="label label-danger m-r-10">+11%</span>From Previous Month</p> --}}
          </div>
        </div>
      </div>
      
    </div>

    <div class="card gutter-b">
        <div class="card-header py-4">
            <h3>Jumlah Responden Per Narasumber</h3>
        </div>
        <div class="card-body p-0">
            <div id="chartdiv"></div>
        </div>
    </div>

    <div class="card gutter-b">
        <div class="card-header py-4">
            <h3>Persentase Topik</h3>
        </div>
        <div class="card-body p-0">
            <div id="chartDonut"></div>
        </div>
    </div>

    {{-- <div class="card gutter-b">
        <div class="card-header py-4">
            <h3>TES</h3>
        </div>
        <div class="card-body p-0">
            <div id="chartLine"></div>
        </div>
    </div> --}}


  </div>

@endsection
@section ('js')
  <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
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

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
  behavior: "none"
}));
cursor.lineY.set("visible", false);


// Generate random data
var date = new Date();
date.setHours(0, 0, 0, 0);
var value = 100;

function generateData() {
  value = Math.round((Math.random() * 10 - 5) + value);
  am5.time.add(date, "day", 1);
  return {
    date: date.getTime(),
    value: value
  };
}

function generateDatas(count) {
  var data = [];
  for (var i = 0; i < count; ++i) {
    data.push(generateData());
  }
  return data;
}


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
  maxDeviation: 0.5,
  baseInterval: {
    timeUnit: "day",
    count: 1
  },
  renderer: am5xy.AxisRendererX.new(root, {
  pan:"zoom"
}),
  tooltip: am5.Tooltip.new(root, {})
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation:1,
  renderer: am5xy.AxisRendererY.new(root, {
  pan:"zoom"
})
}));


// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.SmoothedXLineSeries.new(root, {
  name: "Series",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  valueXField: "date",
  tooltip: am5.Tooltip.new(root, {
    labelText: "{valueY}"
  })
}));

series.fills.template.setAll({
  visible: true,
  fillOpacity: 0.2
});

series.bullets.push(function() {
  return am5.Bullet.new(root, {
    locationY: 0,
    sprite: am5.Circle.new(root, {
      radius: 4,
      stroke: root.interfaceColors.get("background"),
      strokeWidth: 2,
      fill: series.get("fill")
    })
  });
});

chart.set("scrollbarX", am5.Scrollbar.new(root, {
  orientation: "horizontal"
}));


var ds = [];

$.ajax({
  url: "{{ url('/grafik-line') }}",
  type: 'get',
  dataType: 'json',
  success: function(response) {
    for (var i = 0; i < response; ++i) {
      ds.push({
        date: date.getTime(),
        value: 100
      });
    }
    console.log(ds);
    series.data.setAll(ds);

  }
});

// var ds = [{
//   date: "12/12/2022",
//   value: value
//   },
//   {
//   date: "12/12/2022",
//   value: value
//   }];

series.appear(1000);
chart.appear(1000, 100);

});
</script>

@endsection