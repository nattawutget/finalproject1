 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GC-Calendar: Animated Calendar Plugin Example</title>
  <!--link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./dist/calendar-gc.min.css">
  <!--style>
    html,
    body {
      margin: 0;
      overflow-x: hidden;
    }
    body { background: #fafafa; }
  </style-->
</head>
 
<body><div id="jquery-script-menu">
<div class="jquery-script-center">
<ul>
<!--li><a href="https://www.jqueryscript.net/time-clock/animated-calendar-event-gc.html">Download This Plugin</a></li>
<li><a href="https://www.jqueryscript.net/">Back To jQueryScript.Net</a></li-->
</ul><div id="carbon-block"></div>
<div class="jquery-script-ads"><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2783044520727903"
     crossorigin="anonymous"></script>
<!-- jQuery_demo -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-2783044520727903"
     data-ad-slot="2780937993"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
<div class="jquery-script-clear"></div>
</div>
</div>
  <h1 class="text-center" style="margin-top:-50px">ปฏิทินการจองสนามและอุปกรณ์เสริม</h1>
  <div id="calendar" style="padding: 1rem;"></div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./dist/calendar-gc.min.js"></script>
<script src="moment-with-locales.min.js"></script>
<script>
  $(function (e) {
    var calendar = $("#calendar").calendarGC({
      dayBegin: 0,
      prevIcon: '&#x3c;',
      nextIcon: '&#x3e;',
      onPrevMonth: function (e) {
        console.log("prev");
        console.log(e)
      },
      onNextMonth: function (e) {
        console.log("next");
        console.log(e)
      },
      events: [
        {
          date: new Date("2022-02-07"),
          eventName: "Holiday",
          className: "badge bg-danger",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "red"
        },
        {
          date: new Date("2022-02-07"),
          eventName: "Holiday with wife",
          className: "badge bg-danger",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "red"
        },
		{
          date: new Date("2022-02-07"),
          eventName: "Holiday with wife 2",
          className: "badge bg-danger",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "red"
        },
		{
          date: new Date("2022-02-07"),
          eventName: "Holiday with wife 3",
          className: "badge bg-danger",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "red"
        },
        {
          date: new Date("2022-02-08"),
          eventName: "Working day",
          className: "badge bg-success",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "green"
        },
      ],
      onclickDate: function (e, data) {
        console.log(e, data);
		date = moment(data["datejs"]).format('YYYY-MM-DD');
		// alert(date);
		
		var today = new Date();
		
		month = today.getMonth()+1;
		if (month.toString().length == 1) { 
			// alert("Pera"); 
			month = "0" + month;
		}
		date_pera = today.getDate();
		if (date_pera.toString().length == 1) { 
			// alert("Pera Date"); 
			date_pera = "0" + date_pera;
		}
		var date2 = today.getFullYear()+'-'+(month)+'-'+date_pera;
		// alert(date2);
		
		if (date < date2) {
			alert("ไม่สามารถจองวันย้อนหลังได้");
		} else {
		  window.location = 'index.php?page=booking_soccer_fields2&date='+date+'&datejs='+data["datejs"];
		}
      }
    });
  })
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script><script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
</html>
